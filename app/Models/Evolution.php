<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'resumo_evolutivo',
    ];
    protected $casts = [
        'resumo_evolutivo' => 'string',
    ];  

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
    
}
