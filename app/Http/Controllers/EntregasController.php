<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;

class EntregasController extends Controller
{
    public function index(Request $request){
        return view('entrega');
    }

    public function create(Request $request) {

        $entrega = Entrega::create([
            'idCliente' => $request->idCliente,
            'enderecoPartida' => $request->enderecoPartida,
            'enderecoEntrega' => $request->enderecoEntrega,
            'obs' => $request->obs,
            'status' => $request->status,
            'idMotoqueiro' => $request->idMotoqueiro,
            'horarioEntrega' => $request->horarioEntrega
        ]);

        $entrega->save();

        return redirect('entrega');
    }
}
