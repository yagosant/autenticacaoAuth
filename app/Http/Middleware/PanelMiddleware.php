<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //verifica se o usuário está logado e se ele é admin
        if (Auth::guard($guard)->check() && Auth::user()->admin == 1) {
            return $next($request);
        }
    
        return redirect('/home');
    }
    }

