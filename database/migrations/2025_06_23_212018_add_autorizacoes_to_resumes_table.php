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
        Schema::table('resumes', function (Blueprint $table) {
            $table->boolean('autorizacao_uso_dados')->default(false); // Obrigatório para todos
            $table->boolean('autorizacao_responsavel_menor')->nullable(); // Apenas para menores
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resumes', function (Blueprint $table) {
            $table->dropColumn('autorizacao_uso_dados');
            $table->dropColumn('autorizacao_responsavel_menor');
        });
    }
};
