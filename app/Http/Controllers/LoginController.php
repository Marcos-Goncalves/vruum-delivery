<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Motoqueiro;

class LoginController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function login(Request $request):RedirectResponse{

        $usuario = $request->only('telefone', 'senha');

        $user = Usuario::where('telefone', $usuario['telefone'])->first();
        $tipoUsuario = "usuario";

        if (!$user) {
            // Verifica na tabela "Motoqueiro"
            $user = Motoqueiro::where('telefone', $usuario['telefone'])->first();
            $tipoUsuario = "motoqueiro";
        }
    

        if ($user && Hash::check($usuario['senha'], $user->senha)) {
            // Autenticação bem-sucedida

            Session::put('tipoUsuario', $tipoUsuario);
            Auth::login($user);

            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors(['message' => 'Usuario Invalido!']);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
