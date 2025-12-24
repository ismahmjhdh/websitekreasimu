<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    // list materi
    public function index()
    {
        $materis = Materi::latest()->get();
        return view('materi.index', compact('materis'));
    }

    // form tambah materi
    public function create()
    {
        return view('materi.create');
    }

    public function show($id)
    {
        $item = Materi::findOrFail($id);

        return view('materi.show', compact('item'));
    }

    // simpan materi
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'access_password' => 'required',
        ]);

        Materi::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_url' => $request->file_url,
            'access_password' => bcrypt($request->access_password),
            'related_news_id' => $request->related_news_id,
            'created_by' => 1
        ]);

        return redirect('/materi');
    }
}
