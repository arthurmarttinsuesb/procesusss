<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class UsuarioAtivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->status != 'Ativo') {
            return redirect('home');
        }
        return $next($request);
    }
}