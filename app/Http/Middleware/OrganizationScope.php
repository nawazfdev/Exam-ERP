<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationScope
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // SuperAdmin can access everything
        if ($user && $user->hasRole('superadmin')) {
            return $next($request);
        }

        // Organization Admin can only access their organization's data
        if ($user && $user->hasRole('organization-admin')) {
            // Store organization_id in session/request for scoping queries
            $request->merge(['organization_id' => $user->organization_id]);
            return $next($request);
        }

        return abort(403, 'Unauthorized access');
    }
}
