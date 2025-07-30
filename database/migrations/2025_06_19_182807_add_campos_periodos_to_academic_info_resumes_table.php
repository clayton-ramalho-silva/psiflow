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
            $table->string('fundamental_periodo')->nullable();
            $table->string('medio_periodo')->nullable();
            $table->string('tecnico_periodo')->nullable();
            $table->string('superior_curso')->nullable();
            $table->string('superior_semestre')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('academic_info_resumes', function (Blueprint $table) {
            $table->dropColumn('fundamental_periodo');
            $table->dropColumn('medio_periodo');
            $table->dropColumn('tecnico_periodo');
            $table->dropColumn('superior_curso');
            $table->dropColumn('superior_semestre');

        });
    }
};
