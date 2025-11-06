<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExemploController extends Controller
{
    // Retorna um texto simples
    public function hello()
    {
        return response()->json(['message' => 'Hello World!']);
    }

    // Retorna uma lista fake de produtos
    public function lista()
    {
        $dados = [
            ['id' => 1, 'nome' => 'Produto A'],
            ['id' => 2, 'nome' => 'Produto B'],
            ['id' => 3, 'nome' => 'Produto C'],
        ];

        return response()->json($dados);
    }
}
