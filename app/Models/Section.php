<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_hora',
        'duracao',
        'modalidade',
        'valor',
        'status',
        'anotacoes',
        'paciente_id',
        'pagamento'
    ];
    protected $casts = [
        'data_hora' => 'datetime',
        'duracao' => 'datetime',
        'valor' => 'decimal:2',
        'status' => 'string',
        'pagamento' => 'string',    
        'anotacoes' => 'string',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class);
    }
   

}
