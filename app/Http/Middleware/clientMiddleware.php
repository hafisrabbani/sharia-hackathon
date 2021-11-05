<?php

namespace App\Http\Middleware;

use Closure;

class clientMiddleware
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
        if(!session('loginClient')){
            return redirect(route('client.login'));
        }
        return $next($request);
    }
}
