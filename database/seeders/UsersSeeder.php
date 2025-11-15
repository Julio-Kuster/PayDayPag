<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'João Silva',
                'email' => 'joao@example.com',
                'password' => Hash::make('123456'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Maria Santos',
                'email' => 'maria@example.com',
                'password' => Hash::make('654321'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

