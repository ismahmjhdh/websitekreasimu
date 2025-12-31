<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Berita;
use App\Models\Materi;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // ===================== AUTHENTICATION =====================

    // Tampil halaman login
    public function loginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        // Bandingkan password
        if ($admin && $request->password === $admin->password) {
            session(['admin_id' => $admin->id, 'admin_name' => $admin->username]);
            return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    // Logout
    public function logout()
    {
        session()->forget(['admin_id', 'admin_name']);
        return redirect()->route('admin.login')->with('success', 'Logout berhasil!');
    }

    // ===================== DASHBOARD =====================

    // Halaman dashboard admin
    public function dashboard()
    {
        $totalBerita = Berita::count();
        $totalMateri = Materi::count();
        $beritaTerbaru = Berita::latest('created_at')->take(5)->get();
        $materiTerbaru = Materi::latest('created_at')->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalMateri', 'beritaTerbaru', 'materiTerbaru'));
    }

    // ===================== BERITA MANAGEMENT =====================

    // Daftar berita
    public function beritaIndex(Request $request)
    {
        $search = $request->input('search');
        $category = $request->input('category');
        $status = $request->input('status');

        $query = Berita::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
                ->orWhere('content', 'LIKE', "%{$search}%");
        }

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }

        if ($status && $status !== 'all') {
            $query->where('status', $status);
        }

        $beritas = $query->latest('created_at')->paginate(10);

        return view('admin.berita.index', compact('beritas', 'search', 'category', 'status'));
    }

    // Form tambah berita
    public function beritaCreate()
    {
        return view('admin.berita.create');
    }

    // Simpan berita baru
    public function beritaStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:berita,buletin,capaian',
            'status' => 'required|in:draft,published',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        $imageUrl = null;
        $pdfUrl = null;

        // Upload gambar
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/berita'), $filename);
            $imageUrl = 'images/berita/' . $filename;
        }

        // Upload PDF
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $filename);
            $pdfUrl = 'pdf/' . $filename;
        }

        Berita::create([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status,
            'youtube_link' => $request->youtube_link,
            'image_url' => $imageUrl,
            'pdf_url' => $pdfUrl,
            'created_by' => session('admin_id'),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    // Form edit berita
    public function beritaEdit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    // Update berita
    public function beritaUpdate(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|in:berita,buletin,capaian',
            'status' => 'required|in:draft,published',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'pdf_file' => 'nullable|mimes:pdf|max:10240',
        ]);

        // Handle image upload
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/berita'), $filename);
            $berita->image_url = 'images/berita/' . $filename;
        }

        // Handle PDF upload
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('pdf'), $filename);
            $berita->pdf_url = 'pdf/' . $filename;
        }

        $berita->update([
            'title' => $request->title,
            'content' => $request->content,
            'category' => $request->category,
            'status' => $request->status,
            'youtube_link' => $request->youtube_link,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diupdate!');
    }

    // Hapus berita
    public function beritaDelete($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return back()->with('success', 'Berita berhasil dihapus!');
    }

    // ===================== MATERI MANAGEMENT =====================

    // Daftar materi
    public function materiIndex(Request $request)
    {
        $search = $request->input('search');

        $query = Materi::query();

        if ($search) {
            $query->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $materis = $query->latest('created_at')->paginate(10);

        return view('admin.materi.index', compact('materis', 'search'));
    }

    // Form tambah materi
    public function materiCreate()
    {
        $beritas = Berita::all();
        return view('admin.materi.create', compact('beritas'));
    }
    
    // Simpan materi baru
    public function materiStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|file|max:51200', // 50MB
            'access_password' => 'required|string|min:4',
            'related_news_id' => 'nullable|exists:berita,id',
        ]);

        $fileUrl = null;

        // Upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/materi'), $filename);
            $fileUrl = 'uploads/materi/' . $filename;
        }

        Materi::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_url' => $fileUrl,
            'access_password' => $request->access_password, // Bisa di-hash jika perlu
            'related_news_id' => $request->related_news_id,
            'created_by' => session('admin_id'),
        ]);

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil ditambahkan!');
    }

    // Form edit materi
    public function materiEdit($id)
    {
        $materi = Materi::findOrFail($id);
        $beritas = Berita::all();
        return view('admin.materi.edit', compact('materi', 'beritas'));
    }

    // Update materi
    public function materiUpdate(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|file|max:51200',
            'access_password' => 'required|string|min:4',
            'related_news_id' => 'nullable|exists:berita,id',
        ]);

        // Handle file upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/materi'), $filename);
            $materi->file_url = 'uploads/materi/' . $filename;
        }

        $materi->update([
            'title' => $request->title,
            'description' => $request->description,
            'access_password' => $request->access_password,
            'related_news_id' => $request->related_news_id,
        ]);

        return redirect()->route('admin.materi.index')->with('success', 'Materi berhasil diupdate!');
    }

    // Hapus materi
    public function materiDelete($id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return back()->with('success', 'Materi berhasil dihapus!');
    }

    // ===================== GALERI MANAGEMENT =====================

    // Daftar galeri
    public function galeriIndex(Request $request)
    {
        $search = $request->input('search');

        $query = Galeri::query();

        if ($search) {
            $query->where('caption', 'LIKE', "%{$search}%");
        }

        $galeris = $query->latest('created_at')->paginate(12);

        return view('admin.galeri.index', compact('galeris', 'search'));
    }

    // Form tambah galeri
    public function galeriCreate()
    {
        return view('admin.galeri.create');
    }

    // Simpan galeri baru
    public function galeriStore(Request $request)
    {
        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'caption' => 'nullable|string|max:500',
        ]);

        $imageUrl = null;

        // Upload gambar
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $filename);
            $imageUrl = 'images/galeri/' . $filename;
        }

        Galeri::create([
            'image_url' => $imageUrl,
            'caption' => $request->caption,
            'created_by' => session('admin_id'),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan!');
    }

    // Hapus galeri
    public function galeriDelete($id)
    {
        $galeri = Galeri::findOrFail($id);
        
        // Hapus file jika ada
        if ($galeri->image_url && file_exists(public_path($galeri->image_url))) {
            unlink(public_path($galeri->image_url));
        }

        $galeri->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus!');
    }
}

