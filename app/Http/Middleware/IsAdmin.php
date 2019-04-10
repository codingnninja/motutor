<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class IsAdmin
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
        if(auth::user()->type === 'admin') {
            return $next($request);
        } elseif (auth::user()->type === 'instructor') {
            return redirect('/user/dashboards');
        }
        return redirect('/');
    }
}
