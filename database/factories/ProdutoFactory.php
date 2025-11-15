<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->words(3, true),
            'descricao' => fake()->sentence(),
            'preco' => fake()->randomFloat(2, 10, 1000),
            'categoria_id' => Categoria::factory(),
            'user_id' => User::factory(),
        ];
    }
}

