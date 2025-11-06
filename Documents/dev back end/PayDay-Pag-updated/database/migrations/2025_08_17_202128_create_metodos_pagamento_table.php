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
        Schema::create('metodos_pagamento', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Ex: Cartão de Crédito, PIX, Boleto
            $table->string('codigo_metodo')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodos_pagamento');
    }
};
