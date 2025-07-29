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
        Schema::table('personal_info_resumes', function (Blueprint $table) {
            $table->string('filhos_sim')->nullable();
            $table->string('sexo_outro')->nullable();
            $table->string('tipo_cnh')->nullable();
            $table->string('pcd')->nullable();
            $table->string('pcd_sim')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('personal_info_resumes', function (Blueprint $table) {
            $table->dropColumn('filhos_sim');
            $table->dropColumn('sexo_outro');
            $table->dropColumn('tipo_cnh');
            $table->dropColumn('pcd');
            $table->dropColumn('pcd_sim');
        });
    }
};
