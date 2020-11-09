<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (!auth()->user()) {
           return redirect()->route('login');
        }else if(!auth()->user()->hasRole('Médiathécaire')) {
            return redirect()->route('nopermission');
        }
        return $next($request);
    }
}
