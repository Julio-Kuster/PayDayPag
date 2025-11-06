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
        Schema::create('cache', function (Blueprint $table) {
            $table->string('chave')->primary();
            $table->mediumText('valor');
            $table->integer('expiracao');
        });

        Schema::create('bloqueios_cache', function (Blueprint $table) {
            $table->string('chave')->primary();
            $table->string('proprietario');
            $table->integer('expiracao');
        });
    }

    /**
     * Reverte as migrações.
     */
    public function down(): void
    {
        Schema::dropIfExists('cache');
        Schema::dropIfExists('bloqueios_cache');
    }
};
