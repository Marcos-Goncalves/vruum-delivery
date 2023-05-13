<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Motoqueiro extends Authenticatable
{

    protected $table = 'motoqueiros';

    protected $fillable = [
        'nome', 'telefone', 'senha', 'status'
    ];
    use HasFactory;
}
