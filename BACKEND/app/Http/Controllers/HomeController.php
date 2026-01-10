<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Berita;
use App\Models\Materi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('query');
        
        // Minimal 2 karakter untuk mencari
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = [];

        // 1. Cari Berita (include buletin, capaian)
        $beritas = Berita::where('title', 'LIKE', "%{$query}%")
                         ->where('status', 'published') // Hanya yang published
                         ->take(3)
                         ->get();

        foreach ($beritas as $item) {
            $results[] = [
                'title' => $item->title,
                'type' => ucfirst($item->category), // Berita, Buletin, etc.
                'url' => route('berita.show', $item->id),
            ];
        }

        // 2. Cari Materi
        $materis = Materi::where('title', 'LIKE', "%{$query}%")
                         ->take(3)
                         ->get();

        foreach ($materis as $item) {
            $results[] = [
                'title' => $item->title,
                'type' => 'Materi',
                'url' => route('materi.show', $item->id),
            ];
        }

        // 3. Cari Agenda
        $agendas = Agenda::where('title', 'LIKE', "%{$query}%")
                         ->take(3)
                         ->get();

        foreach ($agendas as $item) {
            $results[] = [
                'title' => $item->title,
                'type' => 'Agenda',
                'url' => url('/#agenda'), // Link ke section agenda di beranda
            ];
        }

        return response()->json($results);
    }
}
