<?php

namespace App\Console\Commands;

use App\Models\Resume;
use Illuminate\Console\Command;

class AtualizarCidadesFromLogradouro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'resumes:atualizar-cidades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o campo cidade a partir do logradouro quando cidade estiver vazia';

    // Array de cidades para buscar no logradouro
    protected $cidades = [
        'Santos',
        'São Vicente',
        'Guaruja',
        'Praia Grande',
        'Mongaguá',
        'Bertioga',
        'Peruíbe',
        'Cubatão',
        'Itanhaém'
    ];

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Iniciando atualização de cidades...');

        $padroesCidades = [
            'Santos' => ['santos', 'santo', 'stos', 'sto'],
            'São Vicente' => ['são vicente', 'sao vicente', 's. vicente', 's vicente', 'são vicent', 's vicent'],
            'Guarujá' => ['guarujá', 'guaruja', 'guaruj', 'grj'],
            'Praia Grande' => ['praia grande', 'praia gr', 'p grande', 'praia gde', 'p. grande'],
            'Mongaguá' => ['mongaguá', 'mongagua', 'mongagu', 'mga'],
            'Bertioga' => ['bertioga', 'berti', 'bga'],
            'Peruíbe' => ['peruíbe', 'peruibe', 'peruibe', 'peruíbe', 'pbe'],
            'Cubatão' => ['cubatão', 'cubatao', 'cubat', 'cbt'],
            'Itanhaém' => ['itanhaém', 'itanhaem', 'itanha', 'ith']
        ];

        // Busca currículos com cidades vazias ou nula
        $resumes = Resume::with('contato')
                            ->whereHas('contato', function($query){
                                $query->whereNull('cidade')
                                    ->orWhere('cidade', '');
                            })
                            ->get();
        
        $this->info('Total de currículos encontrados: ' . $resumes->count());

        $atualizados = 0;

        foreach ($resumes as $resume) {
            if (!$resume->contato || empty($resume->contato->logradouro)) {
                continue;
            }

            $logradouro = mb_strtolower($resume->contato->logradouro);
            
            foreach ($padroesCidades as $cidadePadrao => $variacoes) {
                foreach ($variacoes as $variacao) {
                    if (str_contains($logradouro, $variacao)) {
                        $resume->contato->cidade = $cidadePadrao;
                        $resume->contato->save();
                        $atualizados++;
                        $this->info("Atualizado ID {$resume->id}: Cidade definida como {$cidadePadrao} (padrão: {$variacao})");
                        break 2; // Sai dos dois loops quando encontrar
                    }
                }
            }
        }

        $this->info("Processo concluído! Total de currículs atualizados: {$atualizados}");
        return 0;
    }
}
