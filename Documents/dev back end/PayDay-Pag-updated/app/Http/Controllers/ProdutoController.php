<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Listar todos os produtos com suas categorias.
     */
    public function index()
    {
        return Produto::with('categoria')->get();
    }

    /**
     * Criar um novo produto.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'required|exists:usuarios,id',
        ]);

        $produto = Produto::create($request->all());
        return response()->json($produto, 201);
    }

    /**
     * Mostrar um produto específico com categoria.
     */
    public function show($id)
    {
        $produto = Produto::with('categoria')->findOrFail($id);
        return response()->json($produto);
    }

    /**
     * Atualizar um produto existente.
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'sometimes|required|string|max:255',
            'descricao' => 'sometimes|nullable|string',
            'preco' => 'sometimes|required|numeric|min:0',
            'categoria_id' => 'sometimes|required|exists:categorias,id',
        ]);

        $produto->update($request->all());
        return response()->json($produto);
    }

    /**
     * Deletar um produto.
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return response()->json(['message' => 'Produto deletado']);
    }
}
