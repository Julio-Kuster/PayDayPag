<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produtos', ProdutoController::class);
    Route::apiResource('categorias', CategoriaController::class);
});
