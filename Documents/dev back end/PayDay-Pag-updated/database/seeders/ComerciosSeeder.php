<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComerciosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comercios')->insert([
            [
                'usuario_id' => 1,
                'nome_empresa' => 'OcultDay Comércio',
                'cnpj' => '12345678000199',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'usuario_id' => 2,
                'nome_empresa' => 'Petshop Equipe Cão',
                'cnpj' => '98765432000188',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
