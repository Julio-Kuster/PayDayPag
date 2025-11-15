<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComercioController extends Controller
{
    public function index()
    {
        $comercio = Auth::user()->comercio;
        return view('comercio.index', compact('comercio'));
    }

    public function create()
    {
        if (Auth::user()->comercio) {
            return redirect()->route('comercio.index')
                ->with('info', 'Você já possui um comércio cadastrado.');
        }

        return view('comercio.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->comercio) {
            return redirect()->route('comercio.index')
                ->with('info', 'Você já possui um comércio cadastrado.');
        }

        $request->validate([
            'nome_empresa' => 'required|string|max:100',
            'cnpj' => 'required|string|size:14|unique:comercios,cnpj'
        ]);

        Comercio::create([
            'user_id' => Auth::id(),
            'nome_empresa' => $request->nome_empresa,
            'cnpj' => $request->cnpj
        ]);

        return redirect()->route('comercio.index')
            ->with('success', 'Comércio cadastrado com sucesso!');
    }
}

