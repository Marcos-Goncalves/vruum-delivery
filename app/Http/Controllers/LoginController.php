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

    public function login(Request $request) {
        $credentials = $request->only('telefone', 'senha');

        $user = Motoqueiro::where('telefone', $credentials['telefone'])->first();
        
        if ($user && Hash::check($credentials['senha'], $user->senha)) {
            Auth::login($user);
            return redirect()->intended('/home');
        } else {
            return redirect()->back()->withErrors(['message' => 'Credentials']);
        }
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
}
