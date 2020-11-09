<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NeedLogin
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
        $this->forceLangue($request);

        if (!auth()->user()) {
            return redirect()->route('login');
         }
         return $next($request);
    }


    private function forceLangue(Request $request)
    {
        $langague = substr($request->server('HTTP_ACCEPT_LANGUAGE'), 0, 2);
        if ($langague != 'fr') {
            app()->setLocale($langague);
            session()->put('locale', $langague);
        }
    }
}
