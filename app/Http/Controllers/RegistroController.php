<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class RegistroController extends Controller
{
    public function registroForm(){
        return view('createGestor');
    }

    public function listAll(){
        $gestores = Usuario::all();

        return view('listGestor', ['gestores' => $gestores]);
    }

    public function registro(Request $request){
        $this->validate($request, [
            'nome' => 'required',
            'telefone' => 'required|unique:usuarios',
            'senha' => 'required'
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->senha)
        ]);

        return redirect()->intended('/registro/list');
    }

    public function edit($id){
        $gestor = Usuario::find($id);
        return view('editGestor', ['gestor'=>$gestor]);
    }

    public function update(Request $request){
        Usuario::find($request->id)->update($request->all());
        return redirect('/registro/list');
    }
}
