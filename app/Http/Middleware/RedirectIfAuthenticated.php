<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->group == 1){
                return redirect('/admin');
            }elseif(Auth::user()->group == 2){
                return redirect('/cabinet');
            }else{
                return redirect('/');
            }
        }

        return $next($request);
    }
}
