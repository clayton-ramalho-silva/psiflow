<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('genero')->nullable();
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('telefone_fixo')->nullable();            
            $table->string('email')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cep')->nullable();
            $table->longText('historico_medico')->nullable(); // Histórico médico do paciente
            $table->longText('observacoes')->nullable(); // Observações adicionais sobre o paciente( Motivo da busca por analise, etc.)
            $table->boolean('ativo')->default(true);
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Referência ao usuário que criou o paciente 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
