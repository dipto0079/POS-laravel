<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotRestaurant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'restaurant')
    {
        if (!Auth::guard($guard)->check()) {
            toastr()->error('Invalid access! Please login to continue.');
            return redirect()->route('restaurant.showLoginForm');
        }

        return $next($request);
    }
}
