<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entregas;

class EntregasController extends Controller
{
    public function create(Request $request) {

        $entrega = Entregas::create([
            'enderecoPartida' => $request->enderecoPartida,
            'enderecoEntrega' => $request->enderecoEntrega,
            'obs' => $request->obs
        ]);

        $entrega->save();

        return redirect('entrega');
    }
}
