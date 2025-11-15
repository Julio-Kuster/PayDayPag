<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produtos')->insert([
            [
                'nome' => 'Smartphone',
                'descricao' => 'Smartphone com tela de 6.5 polegadas',
                'preco' => 1299.99,
                'categoria_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Camiseta',
                'descricao' => 'Camiseta básica de algodão',
                'preco' => 49.90,
                'categoria_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Livro de Programação',
                'descricao' => 'Livro sobre desenvolvimento web',
                'preco' => 89.90,
                'categoria_id' => 3,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

