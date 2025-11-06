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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->timestamp('email_verificado_em')->nullable();
            $table->string('senha');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('tokens_redefinicao_senha', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('criado_em')->nullable();
        });

        Schema::create('sessoes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('usuario_id')->nullable()->index();
            $table->string('endereco_ip', 45)->nullable();
            $table->text('agente_usuario')->nullable();
            $table->longText('conteudo');
            $table->integer('ultima_atividade')->index();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('tokens_redefinicao_senha');
        Schema::dropIfExists('sessoes');
    }
};
