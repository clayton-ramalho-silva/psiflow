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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->dateTime('data_hora');
            $table->dateTime('duracao')->nullable();
            $table->string('modalidade')->nullable(); // Precencial, Online, telefone
            $table->decimal('valor', 8, 2)->nullable();
            $table->string('status')->default('agendada'); // agendada, em andamento, concluída, cancelada
            $table->longText('anotacoes')->nullable();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->string('pagamento')->nullable(); // Pago, Pendente, Cancelado, isento
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
