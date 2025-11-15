<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    $this->call([
        UsersSeeder::class,
        MetodosPagamentoSeeder::class,
        CategoriasSeeder::class,
        ProdutosSeeder::class,
        ComerciosSeeder::class,
        CarteirasSeeder::class,
        TransacoesSeeder::class,
    ]);
}

}
