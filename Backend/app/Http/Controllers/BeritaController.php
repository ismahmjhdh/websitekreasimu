<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;


class BeritaController extends Controller
{
    // tampil berita (user)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sort = $request->input('sort', 'terbaru');
        $category = $request->input('category');

        $beritas = Berita::published()
            ->search($search)
            ->sortBy($sort)
            ->get();

        return view('berita.index', compact('beritas', 'search', 'sort', 'category'));
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }


    // form tambah berita (admin)
    public function create()
    {
        return view('berita.create');
    }

    // simpan berita
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

Berita::create([
        'title' => $request->input('title'),
        'content' => $request->input('content'),
        'youtube_link' => $request->input('youtube_link'),
        'image_url' => $request->input('image_url'),
        'video_url' => $request->input('video_url'),
        'created_by' => 1,
        'status' => 'published',
]);


        return redirect('/berita');
    }

  
}