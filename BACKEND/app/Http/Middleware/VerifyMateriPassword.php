<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyMateriPassword
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get materi ID dari route parameter - support both 'id' dan 'materiId'
        $materiId = $request->route('id') ?? $request->route('materiId');
        
        if (!$materiId) {
            return response('Unauthorized - Materi ID tidak ditemukan', 401);
        }
        
        // Check if user sudah verify password untuk materi ini
        $verifiedMateris = session('verified_materis', []);
        
        // Verify bahwa materi ID ada di session
        if (!isset($verifiedMateris[$materiId])) {
            // Log unauthorized access attempt
            \Log::warning("Unauthorized materi access attempt", [
                'materi_id' => $materiId,
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            
            return response('Unauthorized - Silakan verifikasi password terlebih dahulu', 401);
        }

        // Additional security: Verify user agent dan IP matching (optional)
        // Uncomment jika ingin strict security
        /*
        $sessionData = $verifiedMateris[$materiId];
        if ($sessionData['user_ip'] !== $request->ip()) {
            return response('Unauthorized - Session IP mismatch', 401);
        }
        */

        return $next($request);
    }
}
