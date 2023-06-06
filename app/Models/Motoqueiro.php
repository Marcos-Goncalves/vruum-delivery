<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Motoqueiro extends Authenticatable
{

    
    protected $guard = 'motoqueiro';

    protected $table = 'motoqueiros';

    protected $fillable = [
        'nome', 'telefone', 'senha', 'status'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    use HasFactory;

    public function entregas()
    {
        return $this->hasMany(Entrega::class, 'idMotoqueiro');
    }
}
