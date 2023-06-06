<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = [
        'idCliente', 'cep', 'rua', 'numero', 'bairro',  'cepEntrega', 'ruaEntrega', 'numeroEntrega', 'bairroEntrega', 'idMotoqueiro', 'obs', 'horarioEntrega'
    ];
    use HasFactory;

    public function setarStatusEmAndamento()
    {
        if ($this->idMotoqueiro !== null && $this->status !== 'EM ANDAMENTO') {
            $this->status = 'EM ANDAMENTO';
            $this->save();
        }

        $motoqueiro = Motoqueiro::find($this->idMotoqueiro);
        if ($motoqueiro) {
            $motoqueiro->status = 'OCUPADO';
            $motoqueiro->fila_ordem = null;
            $motoqueiro->save();
        }
    }
}
