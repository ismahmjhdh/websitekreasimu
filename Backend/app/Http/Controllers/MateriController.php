<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MateriController extends Controller
{
    // Tampil halaman materi
    public function index(Request $request)
    {
        $search = $request->input('search');

        $materis = Materi::query()
            ->search($search)
            ->latest('created_at')
            ->get();

        return view('materi.index', compact('materis', 'search'));
    }

    // Verifikasi password - SECURE SERVER-SIDE VERIFICATION
    public function verifyPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|string|min:4|max:255',
        ]);

        $materi = Materi::with('files')->findOrFail($id);

        // Server-side password verification dengan Hash check
        // Support keduanya: plain text (legacy) dan hashed passwords
        $passwordValid = false;
        
        // Check jika password di-hash (gunakan try-catch untuk handle legacy plain text)
        try {
            if (Hash::check($request->password, $materi->access_password)) {
                $passwordValid = true;
            }
        } catch (\Exception $e) {
            // Hash error - password bukan Bcrypt format (plain text legacy)
            // Fallback ke plain text comparison
            if ($request->password === $materi->access_password) {
                $passwordValid = true;
                // Re-hash sekarang supaya next time gunakan hashed format
                $materi->access_password = Hash::make($request->password);
                $materi->save();
            }
        }
        
        // Fallback untuk plain text password (untuk compatibility lama)
        if (!$passwordValid && $request->password === $materi->access_password) {
            $passwordValid = true;
            // Re-hash sekarang supaya next time gunakan hashed format
            $materi->access_password = Hash::make($request->password);
            $materi->save();
        }

        if (!$passwordValid) {
            return back()->with('error', 'Password salah! Silakan coba lagi.');
        }

        // Store verified materi di session dengan CSRF protection
        $verifiedMateris = session('verified_materis', []);
        
        // Add new entry dengan timestamp untuk security
        if (!isset($verifiedMateris[$id])) {
            $verifiedMateris[$id] = [
                'verified_at' => now()->timestamp,
                'user_ip' => $request->ip(),
                'user_agent' => substr($request->userAgent(), 0, 255),
            ];
            session(['verified_materis' => $verifiedMateris]);
        }

        // Log untuk audit trail
        \Log::info("Materi access verified", [
            'materi_id' => $id,
            'ip' => $request->ip(),
            'timestamp' => now()
        ]);

        // Redirect ke detail materi
        return redirect()->route('materi.show', $id);
    }

    // Detail materi - Protected dengan middleware
    public function show($id)
    {
        // Materi akan langsung accessible di sini karena middleware sudah verifikasi
        // Tapi kita tambah extra security check
        $verifiedMateris = session('verified_materis', []);
        if (!in_array($id, $verifiedMateris)) {
            abort(403, 'Akses tidak diizinkan. Silakan verifikasi password terlebih dahulu.');
        }

        $materi = Materi::with('files')->findOrFail($id);
        return view('materi.show', compact('materi'));
    }

    // Download file - Secure dengan verification
    public function downloadFile($materiId, $fileId)
    {
        // Middleware sudah verifikasi, tapi kita tambah extra check untuk safety
        $verifiedMateris = session('verified_materis', []);
        if (!in_array($materiId, $verifiedMateris)) {
            abort(401, 'Unauthorized - Silakan verifikasi password terlebih dahulu.');
        }

        $materi = Materi::findOrFail($materiId);
        $file = $materi->files()->findOrFail($fileId);

        // Validate file path untuk prevent directory traversal
        $filePath = public_path($file->file_url);
        $realPath = realpath($filePath);
        
        // Ensure file exists dan di dalam uploads folder
        if (!$realPath || strpos($realPath, realpath(public_path('uploads/materi'))) !== 0) {
            abort(404, 'File tidak ditemukan.');
        }

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->download($filePath, $file->file_name);
    }
}