<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminSecurityHeaders
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Security Headers
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-Frame-Options', 'SAMEORIGIN');
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->header('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');
        
        return $response;
    }
}
