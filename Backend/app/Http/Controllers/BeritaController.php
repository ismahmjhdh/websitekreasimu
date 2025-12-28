<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // Tampil berita dengan fitur pencarian dan filter (user)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');
        $category = $request->input('category', 'semua');

        $beritas = Berita::published()
            ->search($search)
            ->category($category)
            ->sortBy($sort)
            ->get();

        return view('berita.index', compact('beritas', 'search', 'sort', 'category'));
    }

    // Detail berita
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    // Download PDF Buletin
    public function downloadPdf($id)
    {
        $berita = Berita::findOrFail($id);
        
        if (!$berita->pdf_url) {
            abort(404, 'File PDF tidak ditemukan');
        }

        $filePath = public_path($berita->pdf_url);
        
        if (!file_exists($filePath)) {
            abort(404, 'File PDF tidak ditemukan');
        }

        $fileName = basename($berita->pdf_url);
        
        return response()->download($filePath, $fileName);
    }

    // Form tambah berita (admin)
    public function create()
    {
        return view('berita.create');
    }

    // Simpan berita
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required|in:berita,buletin,praktik-baik',
            'pdf_file' => 'nullable|mimes:pdf|max:10240', // max 10MB
        ]);

        $pdfUrl = null;
        
        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdfs/buletin'), $fileName);
            $pdfUrl = 'pdfs/buletin/' . $fileName;
        }

        Berita::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'youtube_link' => $request->input('youtube_link'),
            'image_url' => $request->input('image_url'),
            'video_url' => $request->input('video_url'),
            'pdf_url' => $pdfUrl,
            'created_by' => 1,
            'status' => 'published',
            'category' => $request->input('category'),
        ]);

        return redirect('/berita')->with('success', 'Berita berhasil ditambahkan');
    }
}