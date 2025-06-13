<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CandidateAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('candidate')->check()) {
            return redirect()->route('login')->with('error', 'Please login as candidate to access this area.');
        }

        $candidate = Auth::guard('candidate')->user();

        // Check if candidate is active
        if (!$candidate->isActive()) {
            Auth::guard('candidate')->logout();
            return redirect()->route('login')->with('error', 'Your account has been deactivated. Please contact your organization administrator.');
        }

        return $next($request);
    }
}