<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    // protected $password = 'senha';

    protected $fillable = [
        'nome', 'telefone', 'senha'
    ]; 

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    use HasFactory;
}
