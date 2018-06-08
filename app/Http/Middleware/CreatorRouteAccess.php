<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CreatorRouteAccess
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
        if (Auth::User()->type == 1) {
            return $next($request);
        } else {
            return redirect('/');
            // return response('Unauthorized.', 401);
        }
    }
}
