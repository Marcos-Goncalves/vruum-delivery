<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    protected $fillable = [
        'enderecoPartida', 'enderecoEntrega', 'obs', 'horarioEntrega'
    ];
    use HasFactory;
}
