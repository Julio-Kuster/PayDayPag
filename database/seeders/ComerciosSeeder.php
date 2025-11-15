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
                'user_id' => 1,
                'nome_empresa' => 'TechStore Comércio',
                'cnpj' => '12345678000199',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 2,
                'nome_empresa' => 'Petshop Amigo Fiel',
                'cnpj' => '98765432000188',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
