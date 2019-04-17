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
        if(auth::user()->type === 'admin'){
            return $next($request);
        } elseif (auth::user()->type === 'teacher'){
            return redirect('/teacher');
        } elseif (auth::user()->type === 'parent'){
            return redirect('/parent');
        }
        return redirect('/');
    }
}
