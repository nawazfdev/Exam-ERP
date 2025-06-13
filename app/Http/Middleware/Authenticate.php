<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            // Check if we're trying to access candidate routes
            if ($request->is('candidate/*')) {
                return route('login', ['type' => 'candidate']);
            }
            
            return route('login');
        }
        
        return null;
    }

    /**
     * Handle an unauthenticated user.
     */
    protected function unauthenticated($request, array $guards)
    {
        // If candidate guard is specified but not authenticated
        if (in_array('candidate', $guards) && !auth('candidate')->check()) {
            if ($request->expectsJson()) {
                abort(401, 'Unauthenticated');
            }
            return redirect()->route('login', ['type' => 'candidate']);
        }

        parent::unauthenticated($request, $guards);
    }
}