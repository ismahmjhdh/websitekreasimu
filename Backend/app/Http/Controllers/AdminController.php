<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Berita;
use App\Models\Materi;
use App\Models\MateriFile;
use App\Models\Galeri;
use App\Models\HeroSlide;
use App\Models\Agenda;
use App\Models\MapImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // ===================== AUTHENTICATION =====================

    // Tampil halaman login
    public function loginForm()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = trim($request->username);
        $admin = Admin::where('username', $username)->first();

        if ($admin) {
            $passwordValid = false;
            
            // Support keduanya: plain text (legacy/seed) dan hashed passwords
            if ($request->password === $admin->password) {
                $passwordValid = true;
            } else {
                try {
                    if (Hash::check($request->password, $admin->password)) {
                        $passwordValid = true;
                    }
                } catch (\Exception $e) {
                    // Not a hash
                }
            }

            if ($passwordValid) {
                session(['admin_id' => $admin->id, 'admin_name' => $admin->username]);
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
            }
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
            'pdf_file' => 'nullable|mimes:pdf|max:51200',
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
            'content' => $request->input('content'),
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
            'category' => 'required|in:berita,buletin,capaian,praktik-baik',
            'status' => 'required|in:draft,published',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'youtube_link' => 'nullable|url',
            'pdf_file' => 'nullable|mimes:pdf|max:102400',
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
            'content' => $request->input('content'),
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
            'description' => 'required|string|max:5000',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120|dimensions:min_width=300,min_height=200', // 5MB, min dimensions
            'files' => 'required|array|min:1|max:10', // Max 10 files
            'files.*' => 'required|file|mimes:pdf|max:51200', // 50MB per file
            'access_password' => 'required|string|min:4|max:255', // Min 4 chars, simple validation
            'related_news_id' => 'nullable|exists:berita,id',
        ]);

        // Additional security: Validate admin is authenticated
        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Handle thumbnail upload dengan security
        $thumbnailUrl = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            
            // Validate MIME type dari file content
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $thumbnail->getRealPath());
            finfo_close($finfo);
            
            if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif'])) {
                return back()->with('error', 'Format gambar tidak valid. Gunakan JPEG, PNG, atau GIF.');
            }
            
            $thumbnailName = time() . '_' . uniqid() . '_' . $thumbnail->hashName();
            $thumbnail->move(public_path('uploads/materi/thumbnail'), $thumbnailName);
            $thumbnailUrl = 'uploads/materi/thumbnail/' . $thumbnailName;
        }

        // Buat materi baru dengan password di-hash
        $materi = Materi::create([
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail_url' => $thumbnailUrl,
            'access_password' => Hash::make($request->access_password), // HASH PASSWORD untuk security
            'related_news_id' => $request->related_news_id,
            'created_by' => session('admin_id'),
        ]);

        // Upload multiple files dengan validation
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $order = 0;
            
            foreach ($files as $file) {
                // Validate MIME type dari file content
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($finfo, $file->getRealPath());
                finfo_close($finfo);
                
                if ($mimeType !== 'application/pdf') {
                    return back()->with('error', 'Format file tidak valid. Hanya PDF yang diizinkan.');
                }
                
                // Validate file size
                $fileSize = $file->getSize();
                if ($fileSize > 52428800) { // 50MB
                    return back()->with('error', 'Ukuran file melebihi batas 50MB.');
                }
                
                // Use hash name untuk security
                $filename = time() . '_' . uniqid() . '_' . $file->hashName();
                $file->move(public_path('uploads/materi'), $filename);
                $fileUrl = 'uploads/materi/' . $filename;
                
                MateriFile::create([
                    'materi_id' => $materi->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_url' => $fileUrl,
                    'file_type' => 'pdf',
                    'file_size' => $fileSize,
                    'order' => $order++,
                ]);
            }
        }

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
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120|dimensions:min_width=300,min_height=200',
            'files' => 'nullable|array',
            'files.*' => 'nullable|file|mimes:pdf|max:51200',
            'access_password' => 'nullable|string|min:4|max:255',
            'related_news_id' => 'nullable|exists:berita,id',
        ]);

        // Additional security: Validate admin is authenticated
        if (!session('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Handle thumbnail upload dengan security
        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($materi->thumbnail_url && file_exists(public_path($materi->thumbnail_url))) {
                unlink(public_path($materi->thumbnail_url));
            }
            
            $thumbnail = $request->file('thumbnail');
            
            // Validate MIME type dari file content
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $thumbnail->getRealPath());
            finfo_close($finfo);
            
            if (!in_array($mimeType, ['image/jpeg', 'image/png', 'image/gif'])) {
                return back()->with('error', 'Format gambar tidak valid. Gunakan JPEG, PNG, atau GIF.');
            }
            
            $thumbnailName = time() . '_' . uniqid() . '_' . $thumbnail->hashName();
            $thumbnail->move(public_path('uploads/materi/thumbnail'), $thumbnailName);
            $materi->thumbnail_url = 'uploads/materi/thumbnail/' . $thumbnailName;
        }

        // Update data materi
        $updateData = [
            'title' => $request->title,
            'description' => $request->description,
            'thumbnail_url' => $materi->thumbnail_url,
            'related_news_id' => $request->related_news_id,
        ];

        // Only update password jika diberikan (untuk allow edit tanpa mengubah password)
        if ($request->filled('access_password')) {
            $updateData['access_password'] = Hash::make($request->access_password); // HASH PASSWORD
        }

        $materi->update($updateData);

        // Handle file upload jika ada file baru
        if ($request->hasFile('files')) {
            $files = $request->file('files');
            $order = $materi->files()->max('order') + 1 ?? 0;
            
            foreach ($files as $file) {
                // Validate MIME type dari file content
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mimeType = finfo_file($finfo, $file->getRealPath());
                finfo_close($finfo);
                
                if ($mimeType !== 'application/pdf') {
                    return back()->with('error', 'Format file tidak valid. Hanya PDF yang diizinkan.');
                }
                
                // Get file size sebelum move
                $fileSize = $file->getSize();
                if ($fileSize > 52428800) { // 50MB
                    return back()->with('error', 'Ukuran file melebihi batas 50MB.');
                }
                
                $filename = time() . '_' . uniqid() . '_' . $file->hashName();
                $file->move(public_path('uploads/materi'), $filename);
                $fileUrl = 'uploads/materi/' . $filename;
                
                MateriFile::create([
                    'materi_id' => $materi->id,
                    'file_name' => $file->getClientOriginalName(),
                    'file_url' => $fileUrl,
                    'file_type' => 'pdf',
                    'file_size' => $fileSize,
                    'order' => $order++,
                ]);
            }
        }

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
            'type' => 'required|in:photo,video',
            'image_file' => 'required_if:type,photo|nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'video_url' => 'required_if:type,video|nullable|url',
            'caption' => 'nullable|string|max:500',
        ]);

        $imageUrl = null;

        // Upload gambar cover
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/galeri'), $filename);
            $imageUrl = 'images/galeri/' . $filename;
        }

        $galeri = Galeri::create([
            'type' => $request->type,
            'video_url' => $request->video_url,
            'image_url' => $imageUrl,
            'caption' => $request->caption,
            'created_by' => session('admin_id'),
        ]);

        // Jika tipe foto, buat entri pertama di galeri_images sebagai cover
        if ($request->type == 'photo' && $imageUrl) {
            \App\Models\GaleriImage::create([
                'galeri_id' => $galeri->id,
                'image_path' => $imageUrl,
                'order' => 0,
            ]);
        }

        return redirect()->route('admin.galeri.manage', $galeri->id)->with('success', 'Galeri berhasil dibuat! Sekarang Anda bisa menambahkan lebih banyak foto.');
    }

    public function galeriManage($id)
    {
        $galeri = Galeri::with('images')->findOrFail($id);
        return view('admin.galeri.manage', compact('galeri'));
    }

    public function galeriAddImages(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($request->hasFile('images')) {
            $lastOrder = \App\Models\GaleriImage::where('galeri_id', $id)->max('order') ?? 0;
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/galeri'), $filename);
                $path = 'images/galeri/' . $filename;

                \App\Models\GaleriImage::create([
                    'galeri_id' => $id,
                    'image_path' => $path,
                    'order' => ++$lastOrder,
                ]);
            }
        }

        return back()->with('success', 'Foto-foto berhasil ditambahkan ke galeri.');
    }

    public function galeriDeleteImage($id)
    {
        $image = \App\Models\GaleriImage::findOrFail($id);
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }
        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus dari galeri.');
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
    // ===================== HERO SLIDE MANAGEMENT =====================

    public function heroIndex()
    {
        $slides = HeroSlide::orderBy('order')->get();
        return view('admin.hero.index', compact('slides'));
    }

    public function heroStore(Request $request)
    {
        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/hero'), $filename);
            $imagePath = 'images/hero/' . $filename;

            HeroSlide::create([
                'image_path' => $imagePath,
                'title' => $request->title,
                'order' => HeroSlide::max('order') + 1,
            ]);
        }

        return redirect()->route('admin.hero.index')->with('success', 'Slide berhasil ditambahkan!');
    }

    public function heroDelete($id)
    {
        $slide = HeroSlide::findOrFail($id);
        if ($slide->image_path && file_exists(public_path($slide->image_path))) {
            unlink(public_path($slide->image_path));
        }
        $slide->delete();

        return back()->with('success', 'Slide berhasil dihapus!');
    }

    // ===================== AGENDA MANAGEMENT =====================

    public function agendaIndex()
    {
        $agendas = Agenda::latest('date')->paginate(10);
        return view('admin.agenda.index', compact('agendas'));
    }

    public function agendaCreate()
    {
        return view('admin.agenda.create');
    }

    public function agendaStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/agenda'), $filename);
            $imagePath = 'images/agenda/' . $filename;
        }

        Agenda::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil ditambahkan!');
    }

    public function agendaEdit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function agendaUpdate(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image_file')) {
            if ($agenda->image_path && file_exists(public_path($agenda->image_path))) {
                unlink(public_path($agenda->image_path));
            }
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/agenda'), $filename);
            $agenda->image_path = 'images/agenda/' . $filename;
        }

        $agenda->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diupdate!');
    }

    public function agendaDelete($id)
    {
        $agenda = Agenda::findOrFail($id);
        if ($agenda->image_path && file_exists(public_path($agenda->image_path))) {
            unlink(public_path($agenda->image_path));
        }
        $agenda->delete();

        return back()->with('success', 'Agenda berhasil dihapus!');
    }

    // ===================== MAP MANAGEMENT =====================

    public function mapIndex()
    {
        $maps = MapImage::orderBy('order')->get();
        return view('admin.map.index', compact('maps'));
    }

    public function mapStore(Request $request)
    {
        $request->validate([
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
            'title' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image_file')) {
            $file = $request->file('image_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/map'), $filename);
            $imagePath = 'images/map/' . $filename;

            MapImage::create([
                'image_path' => $imagePath,
                'title' => $request->title,
                'order' => MapImage::max('order') + 1,
            ]);
        }

        return redirect()->route('admin.map.index')->with('success', 'Map berhasil ditambahkan!');
    }

    public function mapDelete($id)
    {
        $map = MapImage::findOrFail($id);
        if ($map->image_path && file_exists(public_path($map->image_path))) {
            unlink(public_path($map->image_path));
        }
        $map->delete();

        return back()->with('success', 'Map berhasil dihapus!');
    }
}

