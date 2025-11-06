<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'categoria_id',
        'user_id',
    ];

    // Produto pertence a Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Produto pertence a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
