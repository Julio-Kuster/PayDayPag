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
        // Validate minimal data here (controller may have validated already)
        $nome = Arr::get($data, 'nome', 'Categoria');

        // apply naming strategy
        $formatted = $this->nameContext->execute($nome);

        $categoria = new Categoria();
        $categoria->nome = $formatted;
        $categoria->save();

        return $categoria;
    }
}
