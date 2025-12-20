<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNewsController extends Controller
{
   public function index()
{
    $news = News::all();
    return view('news', compact('news'));
}


    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'content'   => 'required',
        ]);

        return News::create([
            'title'       => $request->title,
            'content'     => $request->content,
            'youtube_link'=> $request->youtube_link,
            'image_url'   => $request->image_url,
            'video_url'   => $request->video_url,
            'created_by'  => Auth::id(),
            'status'      => 'published',
        ]);
    }

    public function show($id)
    {
        return News::findOrFail($id);
    }

    public function verify(Request $request, $id)
{
    $materi = Materi::findOrFail($id);

    if (Hash::check($request->password, $materi->access_password)) {
        return view('materi-detail-content', compact('materi'));
    }

    return back()->with('error', 'Password salah');
}

}


