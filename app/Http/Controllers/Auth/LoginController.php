<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        // return redirect()->route('index');
       // Check if the user has the role of 'superadmin'
       if ($user->hasRole('superadmin')) {
        return redirect()->route('home'); // Redirect to admin dashboard
    }

    // Check if the user has the role of 'user'
    if ($user->hasRole('user')) {
        return redirect()->route('front.dashboard'); // Redirect to user dashboard
    }

    // Default redirect if no role matches
    return redirect('/'); // Redirect to homepage or any fallback route
    }

}
