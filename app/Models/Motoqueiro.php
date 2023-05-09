<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motoqueiro extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'senha', 'status'
    ];
    use HasFactory;
}
