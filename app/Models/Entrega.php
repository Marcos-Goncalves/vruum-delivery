<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'idCliente', 'idEnderecoPartida', 'idEnderecoEntrega', 'numeroEndereco','idMotoqueiro', 'obs', 'horarioEntrega'
    ];
    use HasFactory;
}
