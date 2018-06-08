<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;

class SignInRouteAccessUser
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
        if (!Auth::check()) {
            /* set session variable when clicked on private URLs */
            Session::put('private_url', 'private_url');
            return redirect('/sign-in');
        }

        return $next($request);
    }
}
