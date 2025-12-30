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

    // Verifikasi password dan download/view file
    public function verifyPassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $materi = Materi::findOrFail($id);

        // Cek password (plain text comparison atau bisa pakai Hash jika di-hash)
        if ($request->password === $materi->access_password) {
            // Password benar, redirect ke file atau download
            if ($materi->file_url) {
                $filePath = public_path($materi->file_url);
                
                if (file_exists($filePath)) {
                    // Return file untuk download
                    return response()->download($filePath);
                }
            }
            
            return back()->with('error', 'File tidak ditemukan');
        }

        // Password salah
        return back()->with('error', 'Password salah! Silakan coba lagi.');
    }

    // Detail materi (jika perlu)
    public function show($id)
    {
        $materi = Materi::with('berita')->findOrFail($id);
        return view('materi.show', compact('materi'));
    }
}