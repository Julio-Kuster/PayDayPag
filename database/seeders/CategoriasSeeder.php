<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'nome' => 'Eletrônicos',
                'descricao' => 'Produtos eletrônicos e tecnológicos',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Roupas',
                'descricao' => 'Vestuário e acessórios',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Livros',
                'descricao' => 'Livros físicos e digitais',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

