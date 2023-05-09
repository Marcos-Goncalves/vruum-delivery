<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoqueiro;

class MotoqueirosController extends Controller
{
    public function index(){
        return view('createMotoqueiro');
    }

    public function create(Request $request){

        $motoqueiro = Motoqueiro::create([
            'idMotoqueiro' => $request->idMotoqueiro,
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'senha' => $request->senha
        ]);

        $motoqueiro->save();

        return redirect('motoqueiro');
    }

    public function edit($id){
        $motoqueiro = Motoqueiro::find($id);
        return view('editMotoqueiro', ['motoqueiro'=>$motoqueiro]);
    }

    public function update(Request $request){
        Motoqueiro::find($request->id)->update($request->all());
        return redirect('/motoqueiro');
    }
}
