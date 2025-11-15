<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MetodoPagamento extends Model
{
    use HasFactory;

    protected $table = 'metodos_pagamento';

    protected $fillable = [
        'nome',
        'codigo_metodo',
    ];

    /**
     * Relacionamento: um método de pagamento tem muitas transações
     */
    public function transacoes(): HasMany
    {
        return $this->hasMany(Transacao::class, 'metodo_pagamento_id');
    }
}

