<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relacionamento: um usuário tem muitos produtos
     */
    public function produtos()
    {
        return $this->hasMany(Produto::class, 'user_id');
    }

    /**
     * Relacionamento: um usuário tem uma carteira
     */
    public function carteira()
    {
        return $this->hasOne(Carteira::class, 'user_id');
    }

    /**
     * Relacionamento: um usuário pode ter um comércio
     */
    public function comercio()
    {
        return $this->hasOne(Comercio::class, 'user_id');
    }

    /**
     * Relacionamento: um usuário pode ser pagador em muitas transações
     */
    public function transacoesComoPagador()
    {
        return $this->hasMany(Transacao::class, 'pagador_id');
    }

    /**
     * Relacionamento: um usuário pode ser beneficiário em muitas transações
     */
    public function transacoesComoBeneficiario()
    {
        return $this->hasMany(Transacao::class, 'beneficiario_id');
    }
}
