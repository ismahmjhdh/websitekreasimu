<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class RateLimitMateriPassword
{
    /**
     * Handle an incoming request untuk rate limiting password verification
     * Max 5 attempts per 15 minutes per IP per materi
     */
    public function handle(Request $request, Closure $next): Response
    {
        $materiId = $request->route('id');
        $ip = $request->ip();
        $key = "materi_password_attempt_{$materiId}_{$ip}";
        
        // Get current attempt count
        $attempts = Cache::get($key, 0);
        
        // Check if exceed limit
        if ($attempts >= 5) {
            \Log::warning("Materi password rate limit exceeded", [
                'materi_id' => $materiId,
                'ip' => $ip,
                'attempts' => $attempts
            ]);
            
            return response('Terlalu banyak percobaan. Silakan coba lagi dalam 15 menit.', 429);
        }
        
        // Increment attempt count
        Cache::put($key, $attempts + 1, now()->addMinutes(15));
        
        // Call next middleware/controller
        $response = $next($request);
        
        // Reset counter jika password benar (status 302 redirect)
        if ($response->getStatusCode() === 302) {
            Cache::forget($key);
        }
        
        return $response;
    }
}
