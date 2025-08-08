<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'paciente_id',
        'section_id',
        'conteudo',
        'palavras_chave'
    ];
    
    protected $casts = [
        'palavras_chave' => 'array', // Para armazenar palavras-chave como array JSON
        'conteudo' => 'string', // Conteúdo do prontuário como string
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

}
