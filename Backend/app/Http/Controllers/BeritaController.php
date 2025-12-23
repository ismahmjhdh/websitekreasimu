<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // tampil berita (user)
    public function index()
    {
        $beritas = Berita::where('status', 'published')->latest()->get();
        return view('berita.index', compact('beritas'));
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
