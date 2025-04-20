<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * The path to redirect to if the user is authenticated.
     *
     * @var string
     */
    protected $redirectTo = '/home';
}
