<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next, $role)
    {
        if ($role == 'usuario' && Auth::guard('usuario')->check()) {
            return $next($request);
        }

        if ($role == 'motoqueiro' && Auth::guard('motoqueiro')->check()) {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.');
    }
}