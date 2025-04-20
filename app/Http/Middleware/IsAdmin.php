<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the logged-in user is an admin
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);  // Proceed to the next middleware/controller
        }

        // Redirect to the home page if not an admin
        return redirect()->route('home');
    }

}
