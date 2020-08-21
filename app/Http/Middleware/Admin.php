<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if( Auth::user()->rol_id == 1)
        {
            return $next($request); //la variable $next hace referencia a que pasará a la evaluación si hubiera otro middleware
        }else
        {
            return response()->view('Partials.errors.' . '404', [], 404);
        }

        
    }
}
