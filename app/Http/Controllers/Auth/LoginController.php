<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Add this for logging

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/events';  // Redirect to the admin dashboard directly

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * The user has been authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Log the user's email or additional information
        Log::info('User logged in: ', ['email' => $user->email]);

        // Always redirect to the admin dashboard after successful login
        return redirect()->route('admin.events.index');
    }
}
