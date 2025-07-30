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
        Schema::table('academic_info_resumes', function (Blueprint $table) {
            $table->string('fundamental_modalidade')->nullable();
            $table->string('medio_modalidade')->nullable();
            $table->string('tecnico_modalidade')->nullable();
            $table->string('superior_instituicao')->nullable();
            $table->string('outro_periodo')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_info_resumes', function (Blueprint $table) {
            $table->dropColumn('fundamental_modalidade');
            $table->dropColumn('medio_modalidade');
            $table->dropColumn('tecnico_modalidade');
            $table->dropColumn('superior_instituicao');
            $table->dropColumn('outro_periodo');
        });
    }
};
