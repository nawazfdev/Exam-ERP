<?php
 
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest:web,candidate')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        $userType = $request->input('user_type', 'admin');
        
        // Determine which guard to use based on user type
        $guard = $userType === 'candidate' ? 'candidate' : 'web';
        
        // Check if login is email or username (for candidates)
        $loginField = 'email';
        if ($guard === 'candidate') {
            $loginField = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        }
        
        $credentials = [
            $loginField => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // Add active status check for candidates
        if ($guard === 'candidate') {
            $credentials['status'] = 'active';
        }

        if (Auth::guard($guard)->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::guard($guard)->user();
            return $this->authenticated($request, $user, $guard);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request, $user, $guard = 'web')
    {
        if ($guard === 'candidate') {
            // Check if candidate is active
            if (!$user->isActive()) {
                Auth::guard('candidate')->logout();
                throw ValidationException::withMessages([
                    'email' => ['Your account has been deactivated. Please contact your organization administrator.'],
                ]);
            }
            
            return redirect()->route('candidates.dashboard');
        }

        // Admin users (web guard)
        if ($user->hasRole('superadmin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->hasRole('organization-admin')) {
            return redirect()->route('organization.dashboard');
        }

        // Default fallback
        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        // Determine which guard is currently authenticated
        if (Auth::guard('candidate')->check()) {
            Auth::guard('candidate')->logout();
        } else {
            Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * Validate the user login request.
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'user_type' => 'required|in:admin,candidate',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     */
    public function username()
    {
        return 'email';
    }
}