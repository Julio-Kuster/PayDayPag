<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comercio extends Model
{
    use HasFactory;

    protected $table = 'comercios';

    protected $fillable = [
        'user_id',
        'nome_empresa',
        'cnpj',
    ];

    /**
     * Relacionamento: um comércio pertence a um usuário
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

