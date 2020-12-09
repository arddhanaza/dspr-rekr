<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekAsistenIsLoggedInMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('status') == 'caas') {
            return redirect('/');
        }
        return $next($request);
    }
}
