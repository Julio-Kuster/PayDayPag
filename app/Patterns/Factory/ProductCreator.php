<?php

namespace App\Patterns\Factory;

use App\Models\Produto;

abstract class ProductCreator
{
	// Factory method
	abstract protected function factoryMethod(array $data): Produto;

	// Business logic that uses factory method
	public function create(array $data): Produto
	{
		$produto = $this->factoryMethod($data);
		$produto->save();
		return $produto;
	}
}


