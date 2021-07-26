<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
            $prevURL = url()->previous();
//            dd($prevURL);
            if (strpos($prevURL, '/SuperAdmin/') !== false) {
//                dd("super admin");
                return redirect()->route('superAdmin.dashboard');
            } else if (strpos($prevURL, '/restaurant/') !== false) {
                return redirect()->route('restaurant.home');
            }
        }

        return $next($request);
    }
}
