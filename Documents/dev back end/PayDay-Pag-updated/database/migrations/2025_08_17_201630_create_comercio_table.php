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
        Schema::create('comercios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios', 'id')->onDelete('cascade'); // ID DO USUÁRIO
            $table->string('nome_empresa', 100); // NOME DA EMPRESA QUE USA O SERVIÇO DE PAGAMENTOS
            $table->string('cnpj', 14)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('comercios');
    }
};
