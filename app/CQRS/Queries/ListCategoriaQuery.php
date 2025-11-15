<?php

namespace App\CQRS\Queries;

use App\Models\Categoria;

class ListCategoriaQuery
{
	public function execute()
	{
		return Categoria::all();
	}
}


