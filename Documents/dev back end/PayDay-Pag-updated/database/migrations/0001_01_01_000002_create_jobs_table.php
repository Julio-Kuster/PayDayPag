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
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('fila')->index();
            $table->longText('conteudo');
            $table->unsignedTinyInteger('tentativas');
            $table->unsignedInteger('reservado_em')->nullable();
            $table->unsignedInteger('disponivel_em');
            $table->unsignedInteger('criado_em');
        });

        Schema::create('lotes_tarefas', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nome');
            $table->integer('total_tarefas');
            $table->integer('tarefas_pendentes');
            $table->integer('tarefas_falhas');
            $table->longText('ids_tarefas_falhas');
            $table->mediumText('opcoes')->nullable();
            $table->integer('cancelado_em')->nullable();
            $table->integer('criado_em');
            $table->integer('finalizado_em')->nullable();
        });

        Schema::create('tarefas_falhas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('conexao');
            $table->text('fila');
            $table->longText('conteudo');
            $table->longText('excecao');
            $table->timestamp('falhou_em')->useCurrent();
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
        Schema::dropIfExists('lotes_tarefas');
        Schema::dropIfExists('tarefas_falhas');
    }
};
