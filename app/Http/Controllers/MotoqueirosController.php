<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motoqueiro;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MotoqueirosController extends Controller
{
    public function index(){
        return view('createMotoqueiro');
    }

    public function login(Request $request) {
        $credentials = $request->only("telefone", "senha");

        if (Auth::guard('motoqueiro')->attempt($credentials)) {
            return redirect()->intended('/home');
        } else {
            return redirect()->back()->withErrors(['message' => 'Credentials']);
        }
    }

    public function create(Request $request){

        $motoqueiro = Motoqueiro::create([
            'idMotoqueiro' => $request->idMotoqueiro,
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->senha)
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

    // public function updateStatus(Request $request, $id)
    // {
    //     $user = Motoqueiro::findOrFail($id);
    //     $user->status = $user->status === 'OFFLINE' ? 'ONLINE' : 'OFFLINE'; // Inverte o valor atual do status
    //     $user->save();

    //     return redirect()->back()->with('success', 'Status atualizado com sucesso.');
    // }

    public function updateStatus(Request $request, $id)
    {
        $user = Motoqueiro::findOrFail($id);
        
        if ($user->status === 'ONLINE' && $request->input('status') === 'OFFLINE') {
            // Verifica se o usuário está mudando de online para offline
            $user->fila_ordem = null;
        } elseif ($user->status === 'OFFLINE' && $request->input('status') === 'ONLINE') {
            // Verifica se o usuário está mudando de offline para online
        
            // Encontra o próximo usuário na fila
            $nextUser = Motoqueiro::where('status', 'ONLINE')
                ->orderBy('fila_ordem', 'asc')
                ->first();
        
            if ($nextUser) {
                // Se houver um usuário na fila, o usuário atual será colocado atrás dele
                $user->fila_ordem = $nextUser->fila_ordem + 1;
            } else {
                // Se não houver ninguém na fila, o usuário atual será o primeiro
                $user->fila_ordem = 1;
            }
        }
    
        $user->status = $request->input('status');
        $user->save();
    
        return redirect()->back()->with('success', 'Status atualizado com sucesso.');   
    }

    public function read(Request $request)
    {
        $motoqueiros = Motoqueiro::where('status', 'ONLINE')
            ->get();

        return response()->json($motoqueiros);
    }



}
