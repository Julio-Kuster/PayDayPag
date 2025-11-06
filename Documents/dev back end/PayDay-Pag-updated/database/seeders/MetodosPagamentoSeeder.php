<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodosPagamentoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('metodos_pagamento')->insert([
            ['nome' => 'Cartão de Crédito', 'codigo_metodo' => 'CREDITO', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'PIX', 'codigo_metodo' => 'PIX', 'created_at' => now(), 'updated_at' => now()],
            ['nome' => 'Boleto', 'codigo_metodo' => 'BOLETO', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
