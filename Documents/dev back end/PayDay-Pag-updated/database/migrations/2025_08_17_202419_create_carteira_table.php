<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Executa as migrações.
     */
    public function up(): void
    {
        Schema::create('transacoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pagador_id')->constrained('usuarios')->onDelete('cascade'); // quem paga
            $table->foreignId('beneficiario_id')->constrained('usuarios')->onDelete('cascade'); // quem recebe
            $table->foreignId('metodo_pagamento_id')->constrained('metodos_pagamento')->onDelete('restrict'); // método de pagamento
            $table->decimal('valor', 10, 2); // valor da transação
            $table->string('status')->default('pendente'); // pendente, concluido, falhou
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacoes');
    }
};
