<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
         // Verifica se o dado existe na sessão
         if (Session::has('tipoUsuario')) {
            // Obtém o valor do dado da sessão
            $tipoUsuario = Session::get('tipoUsuario');

            // Verifica o valor do dado e toma ação com base nele
            if ($tipoUsuario === 'motoqueiro') {
                return redirect('/home');
            }
                // Usuário com tipo de login 1
                // Coloque aqui a lógica específica para esse tipo de login
                // Por exemplo, redirecionar para uma rota específica ou retornar uma resposta de erro
            // } elseif ($tipoUsuario === 'tipo2') {
            //     // Usuário com tipo de login 2
            //     // Coloque aqui a lógica específica para esse tipo de login
            //     // Por exemplo, permitir o acesso normalmente
            // }
        }

        // Passa a requisição para o próximo middleware na cadeia
        return $next($request);
    }
}
