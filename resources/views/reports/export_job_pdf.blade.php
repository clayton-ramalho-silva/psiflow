<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Vaga</title>
    <style>
         body { font-family: DejaVu Sans, sans-serif; font-size: 12px; margin: 20px; }
        .header, .footer { width: 100%; text-align: center; position: fixed; }
        .header { top: -40px; }
        .footer { bottom: -30px; font-size: 10px; color: #777; }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        h2 {
            color: #2c3e50;
            border-bottom: 3px solid #3498db;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: white;
        }
        
        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
            border: 1px solid #ddd;
        }
        
        td {
            padding: 12px;
            border: 1px solid #ddd;
            vertical-align: top;
        }
        
        .field-name {
            background-color: #ecf0f1;
            font-weight: bold;
            color: #2c3e50;
            width: 25%;
        }
        
        .field-value {
            background-color: #ffffff;
            color: #34495e;
        }
        
        tr:hover {
            background-color: #f8f9fa;
        }
        
        .section-header {
            background-color: #2c3e50 !important;
            color: white !important;
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
            width: 100%;
        }
        
        .long-text {
            max-width: 400px;
            word-wrap: break-word;
        }
        
        .highlight {
            background-color: #fff3cd;
        }
        
        .money {
            font-weight: bold;
            color: #27ae60;
        }
    </style>
</head>
<body>
     <div class="header">
        
        <strong>Asppe</strong><br>
        <small>{{ now()->format('d/m/Y H:i') }}</small>
    </div>
    <div class="container">
        <h2>INFORMAÇÕES GERAIS</h2>
        
        <table>
            <thead>                
                <tr>
                    <th class="field-name">Data Início Contratação</th>
                    <th class="field-name">Data Fim Contratação</th>
                    <th class="field-name">Data da Entrevista na Empresa</th>
                    <th class="field-name">Status</th>
                    <th class="field-name">Recrutadores</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value">{{ $job->data_inicio_contratacao ? $job->data_inicio_contratacao->format('d/m/Y') : 'Não iniciada' }}</td>
                    <td class="field-value">{{ $job->data_fim_contratacao ? $job->data_fim_contratacao->format('d/m/Y') : 'Não iniciada' }}</td>
                    <td class="field-value">{{ $job->data_entrevista_empresa ? \Carbon\Carbon::parse($job->data_entrevista_empresa)->format('d/m/Y') : 'Não definida' }}</td>
                    <td class="field-value"><strong>{{ $job->status }}</strong></td>
                    <td class="field-value">
                        @foreach ($job->recruiters as $recruiter)
                            <span>{{ $recruiter->name }}</span>@if(!$loop->last), @endif
                        @endforeach
                    </td>
                </tr>                
            </tbody>
        </table>

        <h2>DETALHES DA VAGA</h2>
        <table>
            <thead>
                <tr>                    
                    <th class="field-name">Empresa</th>
                    <th class="field-name">Setor/Cargo</th>
                    <th class="field-name">CBO</th>
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value"><strong>{{ $job->company->nome_fantasia }}</strong></td>
                    <td class="field-value">{{ $job->cargo }}</td>
                    <td class="field-value">{{ $job->cbo }}</td>
                </tr>
            </tbody>
        </table>
        
        <table>
            <thead>
                <tr>                    
                    <th class="field-name">Atividades Esperadas</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value long-text">{{ $job->descricao }}</td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <tr>                    
                    <th class="field-name">Gênero</th>   
                    <th class="field-name">Quantidade de Vagas</th>                    
                    <th class="field-name">Localização</th>   
                    <th class="field-name">Salário</th>   
                      

                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value">{{ $job->genero }}</td>
                    <td class="field-value"><strong>{{ $job->qtd_vagas }}</strong></td>
                    <td class="field-value">{{ $job->cidade }} - {{ $job->uf }}</td>
                    <td class="field-value money">R$ {{ number_format($job->salario, 2, ',', '.') }}</td>
                    
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>                    
                    <th class="field-name">Escala de Trabalho</th>   
                    <th class="field-name">Horário</th>                    
                    <th class="field-name">Dia, Hora e Modalidade do Curso</th>   
                    <th class="field-name">Benefícios</th>   
                      

                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value">{{ $job->dias_semana }}</td>
                    <td class="field-value">{{ $job->horario }}</td>
                    <td class="field-value">{{ $job->dias_curso }}</td>
                    <td class="field-value long-text">{{ $job->exp_profissional }}</td>                   
                </tr>
            </tbody>
        </table>
         <table>
            <thead>
                <tr>                    
                    <th class="field-name">Requisitos/Diferenciais</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value long-text">{{ $job->beneficios }}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>                    
                    <th class="field-name">Conhecimento em Informática</th>   
                    <th class="field-name">Conhecimento em Inglês</th>                    
                </tr>
            </thead>
            <tbody>
                <tr>                    
                    <td class="field-value">{{ $job->informatica }}</td>
                    <td class="field-value">{{ $job->ingles }}</td>                                    
                </tr>
            </tbody>
        </table>          
    </div>

    <div class="footer">
        Asppe
    </div>
</body>
</html>