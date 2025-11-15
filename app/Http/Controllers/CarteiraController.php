<?php

namespace App\Http\Controllers;

use App\Models\Carteira;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteiraController extends Controller
{
    public function index()
    {
        $carteira = Auth::user()->carteira;
        
        if (!$carteira) {
            // Criar carteira se não existir
            $carteira = Carteira::create([
                'user_id' => Auth::id(),
                'saldo' => 0
            ]);
        }

        return view('carteira.index', compact('carteira'));
    }

    public function depositar(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric|min:0.01'
        ]);

        $carteira = Auth::user()->carteira;
        
        if (!$carteira) {
            $carteira = Carteira::create([
                'user_id' => Auth::id(),
                'saldo' => 0
            ]);
        }

        $carteira->saldo += $request->valor;
        $carteira->save();

        return redirect()->route('carteira.index')
            ->with('success', 'Depósito de R$ ' . number_format($request->valor, 2, ',', '.') . ' realizado com sucesso!');
    }
}

