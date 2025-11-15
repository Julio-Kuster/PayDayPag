<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarteirasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('carteiras')->insert([
            ['user_id' => 1, 'saldo' => 1000.00, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'saldo' => 500.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
