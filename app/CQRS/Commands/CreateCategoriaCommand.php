<?php

namespace App\CQRS\Commands;

use App\Models\Categoria;
use App\Patterns\Strategy\NameContext;
use Illuminate\Support\Arr;

class CreateCategoriaCommand
{
	protected NameContext $nameContext;

	public function __construct(NameContext $nameContext)
	{
		$this->nameContext = $nameContext;
	}

	public function execute(array $data): Categoria
	{
		$nome = Arr::get($data, 'nome', 'Categoria');

		$formatted = $this->nameContext->execute($nome);

		$categoria = new Categoria();
		$categoria->nome = $formatted;
		$categoria->save();

		return $categoria;
	}
}


