<?php

namespace App\Imports;

use App\Models\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class CompaniesImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function chunkSize(): int
    {
        return 10;
    }
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
                

        // Removendo espaços extras e garantindo que os campos essecenciais existem
        $cnpj = trim($row['cnpj']);
        $razao_social = trim($row['razao_social']);

        if(empty($cnpj) || empty($razao_social)){
            return null;
        }

        $company = Company::updateOrCreate(['cnpj' => $cnpj],[            
            'razao_social' => $razao_social,
            'nome_fantasia' => trim($row['nome_fantasia']),
            'status' => trim($row['status']),
        ]);

        //$companies = Company::all();
        //dd($data);


        // Criando ou atualizando os contatos da empresa
        if($company->exists){
            // Criando ou atualizando os contatos da empresa via relação
            $company->contacts()->updateOrCreate( [],[                 
                'telefone'      => trim($row['telefone']),
                'email'         => trim($row['e_mail']),
                'nome_contato'  => trim($row['nome_contato']),
                'whatsapp'      => trim($row['whatsapp']),
            
            ]);

            // Criando ou atualizando a localização da empresa via relação
            $company->location()->updateOrCreate([],[
                    'logradouro'        => trim($row['logradouro']),
                    'numero'            => trim($row['numero']),
                    'complemento'       => trim($row['complemento']),
                    'bairro'            => trim($row['bairro']),
                    'cidade'            => trim($row['cidade']),
                    'uf'                => trim($row['uf']),
                    'cep'               => trim($row['cep']),
                    'pais'              => trim($row['pais']),
                ]
            );
        }

        return $company;
    }
}
