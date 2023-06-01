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
        'senha', 'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function findForPassword($telefone) {
        return $this->orWhere('telefone', $telefone)->orWhere('email', $telefone)->first();
    }

    use HasFactory;

}
