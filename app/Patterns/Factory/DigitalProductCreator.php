<?php

namespace App\Patterns\Factory;

use App\Models\Produto;

class DigitalProductCreator extends ProductCreator
{
	protected function factoryMethod(array $data): Produto
	{
		$produto = new Produto();
		$produto->nome = (($data['nome'] ?? 'Produto Digital') . ' (Digital)');
		$produto->descricao = $data['descricao'] ?? null;
		$produto->preco = $data['preco'] ?? 0;
		$produto->categoria_id = $data['categoria_id'] ?? null;
		$produto->user_id = $data['user_id'] ?? null;
		return $produto;
	}
}


