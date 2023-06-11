<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Auth\Guard;
use App\Models\Usuario;
use App\Models\Motoqueiro;

class LoginController extends Controller
{
    public function loginForm(){
        return view('login');
    }

    public function register(Request $request)
    {
        Usuario::create([
            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'senha' => Hash::make($request->senha),
        ]);

        return redirect()->route('/home');
    }

    // public function login(Request $request) {
    //     $credentials = $request->only('telefone', 'senha');

    //     $user = Usuario::where('telefone', $credentials['telefone'])->first();
        
    //     if ($user && Hash::check($credentials['senha'], $user->senha)) {
    //         Auth()->login($user);
    //         return redirect()->intended('/home');
    //     } else {
    //         return redirect()->back()->withErrors(['message' => 'Credentials']);
    //     }
    // }

    // public function logout(Request $request){
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     return redirect('/login');
    // }

    // Método para processar o login
    public function login(Request $request)
    {
        // Validação dos dados do formulário de login
        $request->validate([
            'telefone' => 'required',
            'senha' => 'required',
        ]);

        // Verificação da autenticação básica
        $user = Usuario::where('telefone', $request->telefone)->first();

        if($user != null) {
            if ($user && password_verify($request->senha, $user->senha)) {
                // Autenticação básica bem-sucedida
                $this->authenticateUser($user);
                return redirect('/home');
            }
        } else {
            $motoqueiro = Motoqueiro::where('telefone', $request->telefone)->first();
            if ($motoqueiro && password_verify($request->senha, $motoqueiro->senha)) {
                // Autenticação básica bem-sucedida
                $this->authenticateUser($motoqueiro);
                return redirect('/home/motociclista');
            }
        }
    }

    // Método para realizar a autenticação manualmente
    protected function authenticateUser($user)
    {
        Session::put('user_id', $user->id);
        Session::put('user_name', $user->nome);
        Session::put('user_status', $user->status);
        Session::put('logged_in', true);
    }

    // Método para processar o logout
    public function logout()
    {
        Session::forget('user_id');
        Session::forget('user_name');
        Session::forget('user_status');
        Session::forget('logged_in');
        return redirect('/login');
    }
}
