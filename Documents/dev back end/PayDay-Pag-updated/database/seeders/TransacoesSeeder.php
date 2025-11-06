<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransacoesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transacoes')->insert([
            [
                'pagador_id' => 1,
                'beneficiario_id' => 2,
                'metodo_pagamento_id' => 1,
                'valor' => 150.00,
                'status' => 'pendente',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
