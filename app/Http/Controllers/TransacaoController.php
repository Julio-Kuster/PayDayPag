<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use App\Models\Carteira;
use App\Models\MetodoPagamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::where(function($query) {
                $query->where('pagador_id', Auth::id())
                      ->orWhere('beneficiario_id', Auth::id());
            })
            ->with(['pagador', 'beneficiario', 'metodoPagamento'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('transacoes.index', compact('transacoes'));
    }

    public function create()
    {
        $usuarios = User::where('id', '!=', Auth::id())->get();
        $metodosPagamento = MetodoPagamento::all();
        $carteira = Auth::user()->carteira;

        // Se não houver métodos de pagamento, criar os padrões
        if ($metodosPagamento->isEmpty()) {
            \App\Models\MetodoPagamento::insert([
                ['nome' => 'Cartão de Crédito', 'codigo_metodo' => 'CREDITO', 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'PIX', 'codigo_metodo' => 'PIX', 'created_at' => now(), 'updated_at' => now()],
                ['nome' => 'Boleto', 'codigo_metodo' => 'BOLETO', 'created_at' => now(), 'updated_at' => now()],
            ]);
            $metodosPagamento = MetodoPagamento::all();
        }

        return view('transacoes.create', compact('usuarios', 'metodosPagamento', 'carteira'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiario_id' => 'required|exists:users,id',
            'metodo_pagamento_id' => 'required|exists:metodos_pagamento,id',
            'valor' => 'required|numeric|min:0.01'
        ]);

        $carteira = Auth::user()->carteira;
        
        if (!$carteira || $carteira->saldo < $request->valor) {
            return back()->withErrors(['valor' => 'Saldo insuficiente para realizar a transação.']);
        }

        DB::beginTransaction();
        try {
            // Criar transação
            $transacao = Transacao::create([
                'pagador_id' => Auth::id(),
                'beneficiario_id' => $request->beneficiario_id,
                'metodo_pagamento_id' => $request->metodo_pagamento_id,
                'valor' => $request->valor,
                'status' => 'concluido'
            ]);

            // Debitar do pagador
            $carteira->saldo -= $request->valor;
            $carteira->save();

            // Creditar no beneficiário
            $carteiraBeneficiario = Carteira::firstOrCreate(
                ['user_id' => $request->beneficiario_id],
                ['saldo' => 0]
            );
            $carteiraBeneficiario->saldo += $request->valor;
            $carteiraBeneficiario->save();

            DB::commit();

            return redirect()->route('transacoes.index')
                ->with('success', 'Transação realizada com sucesso!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Erro ao realizar transação: ' . $e->getMessage()]);
        }
    }

    public function show(Transacao $transacao)
    {
        // Verificar se o usuário tem permissão para ver esta transação
        if ($transacao->pagador_id != Auth::id() && $transacao->beneficiario_id != Auth::id()) {
            abort(403);
        }

        $transacao->load(['pagador', 'beneficiario', 'metodoPagamento']);

        return view('transacoes.show', compact('transacao'));
    }
}

