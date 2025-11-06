<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'nome' => 'Lana Rhoades',
                'email' => 'rhoadesanal@example.com',
                'senha' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nome' => 'Clovis Basilio',
                'email' => 'kidbasilio@example.com',
                'senha' => Hash::make('654321'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
