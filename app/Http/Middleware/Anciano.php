<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Anciano
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
        if( Auth::user()->rol_id == 2)
        {
            return $next($request);
        }else
        {
            return response()->view('Partials.errors.' . '404', [], 404);
        }
    }
}
