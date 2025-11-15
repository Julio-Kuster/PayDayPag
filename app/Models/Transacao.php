<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transacao extends Model
{
    use HasFactory;

    protected $table = 'transacoes';

    protected $fillable = [
        'pagador_id',
        'beneficiario_id',
        'metodo_pagamento_id',
        'valor',
        'status',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
    ];

    /**
     * Relacionamento: uma transação tem um pagador (usuário)
     */
    public function pagador(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pagador_id');
    }

    /**
     * Relacionamento: uma transação tem um beneficiário (usuário)
     */
    public function beneficiario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'beneficiario_id');
    }

    /**
     * Relacionamento: uma transação tem um método de pagamento
     */
    public function metodoPagamento(): BelongsTo
    {
        return $this->belongsTo(MetodoPagamento::class, 'metodo_pagamento_id');
    }
}

