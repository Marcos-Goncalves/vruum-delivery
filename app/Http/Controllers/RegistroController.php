<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class RegistroController extends Controller
{
    public function registroForm(){
        return view('registro');
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

        return redirect()->intended('/home');
    }
}
