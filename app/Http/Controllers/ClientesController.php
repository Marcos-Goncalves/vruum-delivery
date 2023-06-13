<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientesController extends Controller
{
    public function index(){
        return view('createCliente');
    }

    public function read(Request $request){
        $clientes = Cliente::all();

        return response()->json($clientes);
    }

    public function listAll(Request $request){
        $clientes = Cliente::all();

        return view('listCliente', ['clientes' => $clientes]);
    }

    public function create(Request $request){

        $cliente = Cliente::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'avaliacao' => $request->avaliacao
        ]);

        $cliente->save();

        return redirect('/cliente/list');
    }

    public function edit($id){
        $cliente = Cliente::find($id);
        return view('editCliente', ['cliente'=>$cliente]);
    }

    public function update(Request $request){
        Cliente::find($request->id)->update($request->all());
        return redirect('/cliente/list');
    }
}
