<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\LazyCollection;
use Carbon\Carbon;

class ResumeImportController extends Controller
{
    /** Curriculos com entrevistas. */
    public function importar($filename)
    {        
        $path = "imports/{$filename}";        
        
        if (!Storage::exists($path)) {
            return response()->json(['erro' => 'Arquivo não encontrado.'], 404);
        }

        $handle = Storage::readStream($path);
        if(!$handle) {
            return response()->json(['erro' => 'Erro ao abrir o arquivo.'], 500);
        }

        $linhas = LazyCollection::make(function () use ($handle)  {
            while (!feof($handle)) {
                $linha = fgets($handle);

                if ($linha !== false) {
                    yield $linha;
                }
            };
        });


        $importados = 0;
        $erros = [];

        foreach ($linhas as $index => $linha) {
            $item = json_decode($linha, true);

            if (!is_array($item)) {
                $erros[] = [
                    'linha' => $index + 1,                    
                    'erro' => 'JSON inválido ou linha em branco.'
                ];
                continue;
            }            
            // Limpa e padroniza as chaves
            $item = $this->limparChaves($item);

            //dd($item);


            /************* Tratando dos dados CURRICULO */

            // Jovem aprendiz
            $ja_foi_jovem_aprendiz = $item['j_foi_jovem_aprendiz'];
            $qual_formadora = null;
            if($ja_foi_jovem_aprendiz === 'Sim, de Outra Qualificadora') {
                $qual_formadora = $item['se_afirmativo_qual_formadora']; // Pertence a entrevisata
            }
           
        
            // createad_at

            $data_raw = trim($item['data'] ?? '');
            $created_at = null;

            if (!empty($data_raw)) {
                try {
                    // Converte de "02/04/25 14:24" → "2025-04-02 14:24:00"
                    $created_at = \Carbon\Carbon::createFromFormat('d/m/y H:i', $data_raw)->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    $this->warn("Data inválida: '{$data_raw}' - " . $e->getMessage());
                }
            }

           

            // "reservista" => "não se aplica"
            $reservista = $item['tem_reservista______________se_for_do_sexo_feminino_colocar_opo_no'];
            if($reservista !== 'Sim') {
                $reservista = 'Não';
            }

            $cpf_formatado = $this->formatarCPF($item['cpf'] ?? '');
            $rg_formatado = $this->formatarRG($item['r_g'] ?? '');
            $tel_residencial = $this->formatarTelefone($item['telefone_residencial'] ?? '');
            $tel_celular = $this->formatarTelefone($item['telefone_celular'] ?? '');

                      

            $formacao = $this->organizarEscolaridade(trim($item['escolaridade']), trim($item['se_graduao_qual_curso']));

            $escolaridade = $formacao['escolaridade'];                     
            $escolaridade_outro = $formacao['escolaridade_outro'];


            

            // Data de nascimento segura
            $data_nascimento_raw = trim($item['data_de_nascimento'] ?? '');
            $data_nascimento = null;

            if (!empty($data_nascimento_raw)) {
                try {
                    // Converte "11/10/04" → "2004-10-11"
                    $data_nascimento = \Carbon\Carbon::createFromFormat('d/m/y', $data_nascimento_raw)->format('Y-m-d');
                } catch (\Exception $e) {
                    $this->warn("Data de nascimento inválida: '{$data_nascimento_raw}' - " . $e->getMessage());
                }
            }



             // convertendo para array vagas_interesse
            $vagas_interesse = [];
            if (!empty($item['em_quais_vagas_voc_est_interessado'])) {
                $vagas_interesse = array_map('trim', explode(',', $item['em_quais_vagas_voc_est_interessado']));
            }
            //$vagas_interesse = explode(', ', trim($row['vagas_interesse']));

            $experiencia_profissional= [];
            // convertendo para array experiencia
            if (!empty($item['j_possui_alguma_experincia_profissional'])) {
                $experiencia_profissional = array_map('trim', explode(',', $item['j_possui_alguma_experincia_profissional']));    
            }


             $status = trim($item['status']);
            if($status === 'ATIVO') {
                $status = 'ativo';
            } else if($status === 'INATIVO') {
                $status = 'inativo';
            } else if($status === 'EFETIVADO') {
                $status = 'contratado';
            } else {
                $status = 'ativo';
            }


            $cnh = trim($item['cnh']);
            if($cnh !== 'Sim') {
                $cnh = 'Não';
            } 

            //$recruiter_id = intval($item['entrevistador']);


            /** Gravando no banco */
            $resume = Resume::create([
                'foi_jovem_aprendiz' => $ja_foi_jovem_aprendiz,
                'status' => $status,
                'curriculo_externo' => $item['envie_seu_currculo'],            
                'created_at' => $created_at,
                'vagas_interesse' => $vagas_interesse ?? null,
                'experiencia_profissional' => $experiencia_profissional ?? null,                        
                //'codigo_unico' => $codigo_unico,
    
            ]);
    
            $resume->informacoesPessoais()->create([
                'nome' => $item['nome_completo'] ?? 'N/A',
                'data_nascimento' =>  $data_nascimento,
                'sexo' => $item['sexo'],
                //'sexo_outro' =>  $sexo_outo,
                'rg' => $rg_formatado,
                'cpf' => $cpf_formatado,
                'reservista' => $reservista,
                'foto_candidato_externa' => $item['foto'] ?? '',
                'created_at' =>$created_at,
                'estado_civil' => $item['estado_civil'],
                'possui_filhos' => $item['possui_filhos'],
                'cnh' => $cnh,
                //'reservista_outro' => '',
                //'instagram' => $data['instagram'],
                //'linkedin' => $data['linkedin'],
                //'tamanho_uniforme' => trim($row['tamanho_uniforme']) ?? 'N/A',
    
            ]);
    
            $resume->escolaridade()->create([
                'informatica' => $item['possui_conhecimento_de_informtica'],
                'ingles' => $item['possui_conhecimento_de_ingls'],
                'escolaridade' => $escolaridade, // Fundamental completo, Fundamental cursando, Medio completo, Medio cursando, Tecnico completo, Tecnico cursando, Superior Completo Superior Cursando ou Outro
                'escolaridade_outro' => $escolaridade_outro,                                                
                'created_at' => $created_at,
    
            ]);
    
            $resume->contato()->create([
                'telefone_residencial' => $tel_residencial, // Telefone de contato
                //'nome_contato' =>  $nome_contato,
                'telefone_celular' => $tel_celular,
                'logradouro' => $item['endereo'],
                'bairro' => $item['bairro'],
                'cidade' => $item['cidade'],
                'created_at' => $created_at,
                'email' => $item['email'],
                //'numero' => 'N/A',
                //'complemento' => null,
                //'uf' => 'N/A',
                //'cep' => 'N/A',
    
            ]);

            $obs_resume = $item['obs_resume']; 

            if(isset($obs_resume) && $obs_resume != ''){
                $resume->observacoes()->create([
                    'observacao' => $obs_resume,
                    'created_at' => $created_at,
                ]);
    
            }

             /** Tratando e gravando a entrevista */

             // createad_at

            // $data_da_entrevista_raw = trim($item['data_da_entrevista'] ?? '');
            // $created_at_entrevista = null;

            // if (!empty($data_da_entrevista_raw)) {
            //     try {
            //         // Converte de "02/04/25 14:24" → "2025-04-02 14:24:00"
            //         $created_at_entrevista = \Carbon\Carbon::createFromFormat('d/m/y H:i', $data_da_entrevista_raw)->format('Y-m-d H:i:s');
            //     } catch (\Exception $e) {
            //         $this->warn("Data inválida: '{$data_da_entrevista_raw}' - " . $e->getMessage());
            //     }
            // }

            // Tratamento do created_at da entrevista
            $data_da_entrevista_raw = trim($item['data_da_entrevista'] ?? '');
            $hora_da_entrevista_raw = trim($item['hora_da_entrevista'] ?? '');
            $created_at_entrevista = null;

            if (!empty($data_da_entrevista_raw)) {
                try {
                    // Converte a data "24/04/25" para Carbon
                    $data_carbon = Carbon::createFromFormat('d/m/y', $data_da_entrevista_raw);

                    // Trata a hora
                    if (is_numeric($hora_da_entrevista_raw)) {
                        $hora_formatada = $this->excelFloatToTime((float) $hora_da_entrevista_raw);
                    } elseif (preg_match('/^\d{1,2}:\d{2}(:\d{2})?$/', $hora_da_entrevista_raw)) {
                        // Já está no formato "HH:mm" ou "HH:mm:ss"
                        $hora_formatada = strlen($hora_da_entrevista_raw) === 5
                            ? $hora_da_entrevista_raw . ':00'
                            : $hora_da_entrevista_raw;
                    } else {
                        // Hora ausente ou inválida
                        $hora_formatada = '00:00:00';
                    }

                    // Junta a data e a hora
                    $created_at_entrevista = Carbon::createFromFormat('Y-m-d H:i:s', $data_carbon->format('Y-m-d') . ' ' . $hora_formatada);
                } catch (\Exception $e) {
                    $this->warn("Erro ao processar created_at da entrevista: {$data_da_entrevista_raw} {$hora_da_entrevista_raw} - " . $e->getMessage());
                }
            }

            // Fammila cras

            $tipo_beneficio = $item['sua_famlia__atendida_no_cras'];
            if($tipo_beneficio) {
                $familia_cras = 'Sim';
            } else {
                $familia_cras = 'Não';
            }

            // observações

            $observacao = $item['entrevistas']."\n";
            $observacao .= $item['observacoes'] ?? 'N/A';

            $resume->interview()->create(                
                [
                    'saude_candidato' => trim($item['sade']),
                    'vacina_covid' => trim($item['vacina_covid']),
                    //'perfil' => trim($row['perfil'])  ?? 'N/A',
                    'perfil_santa_casa' => $item['santa_casa'],
                    'classificacao'  => $item['classificao'],
                    'qual_formadora' => $qual_formadora, 
                    'parecer_recrutador' => $item['parecer_do_entrevistador'], 
                    'curso_extracurricular' => $item['curso_extracurricular'], 
                    'apresentacao_pessoal' => $item['apresentao_pessoal'], 
                    'experiencia_profissional' => $item['experincia_profissional_tempo_de_empresamotivo_da_sada'], 
                    'caracteristicas_positivas' => $item['caractersticas_positivas'], 
                    'habilidades' => $item['habilidades'], 
                    'porque_ser_jovem_aprendiz' => $item['por_que_gostaria_de_ser_jovem_aprendiz'], 
                    'qual_motivo_demissao' => $item['por_qual_motivo_voc_pediria_demisso'], 
                    'pretencao_candidato' => $item['pretenes_do_candidato'], 
                    'objetivo_longo_prazo' => $item['pretenes_do_candidato'], 
                    'pontos_melhoria' => $item['pontos_de_melhoria'], 
                    'familia' => $item['familia'], 
                    'disponibilidade_horario' => $item['disponibilidade_de_horrio'], 
                    'sobre_candidato' => $item['fale_um_pouco_mais_sobre_voc'], 
                    'rotina_candidato' => $item['qual_a_sua_rotina'], 
                    'familia_cras' => $familia_cras,
                    'outros_idiomas' => $item['outros_idiomas'], 
                    'fonte_curriculo' => $item['fonte_de_captao_do_currculo'],
                    'renda_familiar' => $item['qual_a_renda_familiar_da_sua_casa'],
                    'tipo_beneficio' => $tipo_beneficio,
                    //'sugestao_empresa' => $item['santa_casa'], 
                    'observacoes' => $observacao  ?? 'N/A', 
                    //'pontuacao' => $item['santa_casa'],                      
                    'resume_id' => $resume->id,
                    'recruiter_id' => $item['entrevistador'], // joe doe temp
                    'created_at' => $created_at_entrevista,
                ]
            );

            $importados++;
        }

        fclose($handle);

        return response()->json([
            'mensagem' => 'Importação concluída.',
            'importados' => $importados,
            'falhas' => $erros,
        ]);

        //dd($item);

    }


     // 🔧 Função para limpar e padronizar chaves
    private function limparChaves(array $registro): array
    {
        $limpo = [];
        foreach ($registro as $chave => $valor) {
            $novaChave = preg_replace('/[^a-zA-Z0-9_ ]/', '', $chave); // remove : (dois-pontos), acentos etc.
            $novaChave = str_replace(' ', '_', $novaChave); // espaço para _
            $novaChave = strtolower($novaChave); // opcional: todas minúsculas
            $limpo[$novaChave] = $valor;
        }
        return $limpo;
    }

    // // Organiza os telefones
    // private function reorganizarTelefones($telefones) {
    //     // Remove os espaços e normaliza a string
    //     $telefones = trim(preg_replace('/\s+/', ' ', $telefones));

    //     // Regex para capturar números de telefone em vários formatos:
    //     // (XX) XXXX-XXXX, XX XXXX-XXXX, XXXXXXXXXX, (XX) XXXXX-XXXX, etc.
    //     $phoneRegex = '/(?:\(?\d{2}\)?[\s\-\.]*\d{4,5}[\s\-\.]*\d{4})/';

    //     // Encontra todos os números de telefones
    //     preg_match_all($phoneRegex, $telefones, $matches);
    //     $phones = $matches[0];

    //     // Remove os números de telefone para extrair as observações restantes
    //     $obs = trim(preg_replace($phoneRegex, '', $telefones));

    //     // Limpa a observação (remove caracteres desnecessários no início/fim)
    //     $obs = preg_replace('/^[\s\/\:\,]+|[\s\/\:\,]+$/', '', $obs);
    //     $obs = preg_replace('/\s+/', ' ', $obs); // Normaliza espaços

    //     // Formata os números de telefone
    //     $celular_candidato = isset($phones[0]) ? $this->formatarTelefone($phones[0]) : '';
    //     $numero_recado = isset($phones[1]) ? $this->formatarTelefone($phones[1]) : '';

    //     return [
    //         'celular_candidato' => $celular_candidato,
    //         'numero_recado' => $numero_recado,
    //         'obs' => $obs
    //     ];
    // }

    // private function formatarTelefone($phone) {
    //     // Remove tudo que não for dígito
    //     $phone = preg_replace('/[^\d]/', '', $phone);
        
    //     // Formata como (XX) XXXXX-XXXX (celular) ou (XX) XXXX-XXXX (fixo)
    //     if (strlen($phone) === 11) {
    //         return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $phone);
    //     } elseif (strlen($phone) === 10) {
    //         return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $phone);
    //     }
        
    //     return $phone; // Retorna sem formatação se não for 10 ou 11 dígitos
    // }

    private function organizarEscolaridade($escolaridade, $curso)
    {
        
        // Escolaridade
        $escolaridade;
        $escolaridade_outro = null;

        
        //$lista_escolaridade = ['Ensino médio completo', 'Ensino médio cursando', 'Ensino técnico completo', 'Ensino técnico cursando', 'Graduação completa', 'Graduação cursando', 'Outro', 'Tecnologo cursando'];
        
        switch($escolaridade) {
            case ('Ensino médio completo'):
                $escolaridade = array('Ensino Médio Completo');
                break;
            case ('Ensino técnico completo'):
                $escolaridade = array('Ensino Técnico Completo');
                break;
            case ('Graduação completa'):
                $escolaridade = array('Superior Completo');
                break;
            case ('Ensino médio cursando'):
                $escolaridade = array('Ensino Médio Cursando');                
                break;
            case ('Ensino técnico cursando'):
                $escolaridade = array('Ensino Técnico Cursando');                
                break;
            case ('Graduação cursando'):
                $escolaridade = array('Superior Cursando');                
                break;
            case ('Outro'):
                $escolaridade = array('Outro');                
                break;
            default:
                $escolaridade = array('Outro');
                $escolaridade_outro = $curso;
                break;
        };

        return [
            'escolaridade' => $escolaridade,            
            'escolaridade_outro' =>  $escolaridade_outro,
        ];

    }

    private function formatarCPF($cpf)
    {
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
        if (strlen($cpf) !== 11) return null;

        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $cpf);
    }

    private function formatarRG($rg)
    {
        $rg = preg_replace('/[^0-9]/', '', $rg);
        if (strlen($rg) < 7 || strlen($rg) > 9) return null;

        return preg_replace('/(\d{1,2})(\d{3})(\d{3})(\d?)/', '$1.$2.$3-$4', str_pad($rg, 9, '0', STR_PAD_LEFT));
    }

    private function formatarTelefone($telefone)
    {
        $telefone = preg_replace('/[^0-9]/', '', $telefone);

        // Sem DDD (8 ou 9 dígitos)
        if (strlen($telefone) === 8) {
            return preg_replace('/(\d{4})(\d{4})/', '$1-$2', $telefone);
        }

        if (strlen($telefone) === 9) {
            return preg_replace('/(\d{5})(\d{4})/', '$1-$2', $telefone);
        }

        // Com DDD fixo
        if (strlen($telefone) === 10) {
            return preg_replace('/(\d{2})(\d{4})(\d{4})/', '($1) $2-$3', $telefone);
        }

        // Com DDD celular
        if (strlen($telefone) === 11) {
            return preg_replace('/(\d{2})(\d{5})(\d{4})/', '($1) $2-$3', $telefone);
        }

        // Qualquer outro caso
        return $telefone;
    }

    private function excelFloatToTime($excelFloat)
    {
        $totalSegundos = round($excelFloat * 86400); // 86400 segundos em 1 dia
        $horas = floor($totalSegundos / 3600);
        $minutos = floor(($totalSegundos % 3600) / 60);
        $segundos = $totalSegundos % 60;

        return sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
    }
}
