<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'data_nascimento',
        'genero',
        'cpf',
        'rg',
        'telefone_celular',
        'telefone_fixo',
        'email',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'historico_medico',
        'observacoes',
        'ativo',
        'user_id'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'ativo' => 'boolean',
        'historico_medico' => 'string', // Histórico médico do paciente como string
        'observacoes' => 'string', // Observações adicionais sobre o paciente

    ];

    

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class);
    }
    public function evolutions()
    {
        return $this->hasMany(Evolution::class);
    }
}
