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
        Schema::create('prontuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade'); // Referência ao paciente
            $table->foreignId('section_id')->constrained()->onDelete('cascade'); // Referência à seção
            $table->longText('conteudo')->nullable(); // Conteúdo do prontuário
            $table->json('palavras_chave')->nullable(); // Palavras-chave para busca
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prontuarios');
    }
};
