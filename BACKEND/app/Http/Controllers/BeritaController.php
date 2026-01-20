<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Halaman Berita (hanya kategori 'berita')
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');

        $beritas = Berita::published()
            ->category('berita')
            ->search($search)
            ->sortBy($sort)
            ->get();

        return view('berita.index', compact('beritas', 'search', 'sort'));
    }

    // Halaman Buletin (hanya kategori 'buletin')
    public function buletin(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');

        $buletins = Berita::published()
            ->category('buletin')
            ->search($search)
            ->sortBy($sort)
            ->get();

        return view('berita.buletin', compact('buletins', 'search', 'sort'));
    }

    // Halaman Capaian (hanya kategori 'capaian')
    public function capaian(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');

        $capaians = Berita::published()
            ->category('capaian')
            ->search($search)
            ->sortBy($sort)
            ->get();

        return view('berita.capaian', compact('capaians', 'search', 'sort'));
    }

    // Detail berita/buletin/capaian
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
            'category' => 'required|in:berita,buletin,capaian',
            'pdf_file' => 'nullable|mimes:pdf|max:102400',
        ]);

        $pdfUrl = null;
        
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $fileName);
            $pdfUrl = 'pdf/' . $fileName;
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