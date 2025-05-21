<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        // Extract the language from the URL segment
        $segments = $request->segments();
        $locale = $segments[0] ?? null;

        // Set the locale from the URL or use the one stored in the session
        app()->setLocale($locale ?: Session::get('locale', config('app.locale')));

        // Store the current locale in the session for future requests
        Session::put('locale', app()->getLocale());

        return $next($request);
    }
}
