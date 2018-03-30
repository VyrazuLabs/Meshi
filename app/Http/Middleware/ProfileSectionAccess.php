<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfileSectionAccess
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
        if(!Auth::check()){
            return redirect('/sign-in');
        }

        return $next($request);
    }
}