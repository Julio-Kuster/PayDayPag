<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota simples de exemplo (Hello World)
Route::get('/hello', [\App\Http\Controllers\ExemploController::class, 'hello'])->name('hello');
Route::get('/exemplo/lista', [\App\Http\Controllers\ExemploController::class, 'lista'])->name('exemplo.lista');

Route::get('/dashboard', function () {
    $user = Auth::user();
    // Garantir que os relacionamentos sejam carregados
    $user->load(['carteira', 'comercio', 'transacoesComoPagador', 'transacoesComoBeneficiario']);
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Rotas de Carteira
    Route::get('/carteira', [\App\Http\Controllers\CarteiraController::class, 'index'])->name('carteira.index');
    Route::post('/carteira/depositar', [\App\Http\Controllers\CarteiraController::class, 'depositar'])->name('carteira.depositar');
    
    // Rotas de Transações
    Route::resource('transacoes', \App\Http\Controllers\TransacaoController::class)->except(['edit', 'update', 'destroy']);
    
    // Rotas de Comércio
    Route::resource('comercio', \App\Http\Controllers\ComercioController::class)->only(['index', 'create', 'store']);
});

require __DIR__.'/auth.php';
