<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\CQRS\Commands\CreateCategoriaCommand;
use App\CQRS\Queries\ListCategoriaQuery;
use App\Patterns\Strategy\NameContext;
use App\Patterns\Strategy\UpperCaseStrategy;

class CategoriaController extends Controller
{
    protected ListCategoriaQuery $listQuery;
    protected CreateCategoriaCommand $createCommand;

    // Dependency Injection of CQRS handlers and a default naming strategy
    public function __construct(ListCategoriaQuery $listQuery, CreateCategoriaCommand $createCommand)
    {
        $this->listQuery = $listQuery;
        $this->createCommand = $createCommand;
    }

    // Read operation: uses Query (CQRS)
    public function index()
    {
        return $this->listQuery->execute();
    }

    // Create operation: uses Command (CQRS) and Strategy for name formatting
    public function store(Request $request){
        $request->validate(['nome' => 'required|string|max:255']);

        // by default use UpperCaseStrategy; the CreateCategoriaCommand receives a NameContext via service container
        return ($this->createCommand->execute($request->all()));
    }

    public function show($id){ return Categoria::findOrFail($id); }

    public function update(Request $request, $id){
        $categoria = Categoria::findOrFail($id);
        $request->validate(['nome' => 'sometimes|required|string|max:255']);
        $categoria->update($request->all());
        return $categoria;
    }

    public function destroy($id){
        Categoria::findOrFail($id)->delete();
        return response()->json(['message' => 'Categoria deletada']);
    }
}
