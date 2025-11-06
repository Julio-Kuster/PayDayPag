<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_produto()
    {
        $user = User::factory()->create();
        $categoria = Categoria::factory()->create();
        $data = [
            'nome' => 'Produto Teste',
            'descricao' => 'Descrição teste',
            'preco' => 50,
            'categoria_id' => $categoria->id,
            'user_id' => $user->id,
        ];
        $produto = Produto::create($data);
        $this->assertDatabaseHas('produtos', ['nome' => 'Produto Teste']);
    }

    public function test_atualiza_produto()
    {
        $produto = Produto::factory()->create(['nome' => 'Antigo']);
        $produto->update(['nome' => 'Novo']);
        $this->assertEquals('Novo', $produto->nome);
    }

    public function test_deleta_produto()
    {
        $produto = Produto::factory()->create();
        $produto->delete();
        $this->assertDatabaseMissing('produtos', ['id' => $produto->id]);
    }
}
