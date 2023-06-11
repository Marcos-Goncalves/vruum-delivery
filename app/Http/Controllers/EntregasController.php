<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrega;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon; // Importe a classe Carbon para manipulação de datas e horários

class EntregasController extends Controller
{
    public function index(Request $request){
        return view('createEntrega');
    }

    public function read(Request $request){
        $entregas = Entrega::all();

        return view('home', ['data'=>$entregas]);
    }

    public function listAll(Request $request){
        $entregas = Entrega::all();

        return view('listEntrega', ['entregas'=>$entregas]);
    }

    public function create(Request $request) {

        $entrega = Entrega::create([
            'idCliente' => $request->idCliente,
            'cep' => $request->cep,
            'rua' => $request->rua,
            'numero' => $request->numero,
            'bairro' => $request->bairro,
            'cepEntrega' => $request->cepEntrega,
            'ruaEntrega' => $request->ruaEntrega,
            'numeroEntrega' => $request->numeroEntrega,
            'bairroEntrega' => $request->bairroEntrega,
            'status' => $request->status,
            'idMotoqueiro' => $request->idMotoqueiro,
            'horarioEntrega' => $request->horarioEntrega
        ]);

        $entrega->save();

        return redirect('home');
    }

    public function edit($id){
        $entrega = Entrega::find($id);
        return response()->json($entrega);
        // return view('modal', ['entrega'=> $entrega]);
    }

    public function update(Request $request){
        // Entrega::find($request->id)->update($request->all());
        $entrega = Entrega::find($request->id);
        $entrega->update($request->all());
        $entrega->setarStatusEmAndamento();
        return redirect('/home');
    }

    public function finalizarEntrega(Request $request, $id){
        $entrega = Entrega::find($id);

        $entrega->status = 'CONCLUÍDO';
        $entrega->horarioEntrega = Carbon::now();

        $cliente = Cliente::find($entrega->idCliente);
        $valorAvaliacao = $cliente->avaliacao; // Valor atual de avaliação
        $novaAvaliacao = ($valorAvaliacao + $request->ratingCliente) / 2; // Calcula a nova avaliação
        $cliente->avaliacao = $novaAvaliacao;

        $entrega->save();
        $cliente->save();

        return redirect()->back()->with('success', 'Entrega finalizada com sucesso!');   
    }
}
