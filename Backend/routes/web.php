<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $slides = \App\Models\HeroSlide::orderBy('order')->get();
    $agendas = \App\Models\Agenda::latest('date')->take(3)->get();
    $maps = \App\Models\MapImage::orderBy('order')->get();
    $testimonis = \App\Models\Testimoni::latest()->get();
    return view('beranda', compact('slides', 'agendas', 'maps', 'testimonis'));
});

Route::get('/beranda', function () {
    $slides = \App\Models\HeroSlide::orderBy('order')->get();
    $agendas = \App\Models\Agenda::latest('date')->take(3)->get();
    $maps = \App\Models\MapImage::orderBy('order')->get();
    $testimonis = \App\Models\Testimoni::latest()->get();
    return view('beranda', compact('slides', 'agendas', 'maps', 'testimonis'));
})->name('beranda');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/api/search', [HomeController::class, 'search'])->name('api.search');

Route::get('/galeri', function (\Illuminate\Http\Request $request) {
    $type = $request->query('type');
    $query = \App\Models\Galeri::latest('created_at');
    
    if ($type) {
        $query->where('type', $type);
    }
    
    $galeris = $query->paginate(9);
    return view('galeri', compact('galeris', 'type'));
})->name('galeri');

Route::get('/galeri/{id}', function ($id) {
    $galeri = \App\Models\Galeri::with('images')->findOrFail($id);
    return view('galeri1', compact('galeri'));
})->name('galeri1');


// ================= BERITA =================
Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita');

Route::get('/buletin', [BeritaController::class, 'buletin'])->name('buletin');
Route::get('/capaian', [BeritaController::class, 'capaian'])->name('capaian');

Route::get('/berita/create', [BeritaController::class, 'create'])
    ->name('berita.create');


Route::post('/berita', [BeritaController::class, 'store'])
    ->name('berita.store');

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/berita/{id}/download-pdf', [BeritaController::class, 'downloadPdf'])->name('berita.download');



// ================= MATERI =================
Route::get('/materi', [MateriController::class, 'index'])
    ->name('materi');

Route::get('/materi/create', [MateriController::class, 'create'])
    ->name('materi.create');

Route::post('/materi', [MateriController::class, 'store'])
    ->name('materi.store');

Route::post('/materi/{id}/verify', [MateriController::class, 'verifyPassword'])
    ->name('materi.verify')
    ->middleware('rate.limit.materi');

Route::get('/materi/{id}', [MateriController::class, 'show'])
    ->name('materi.show')
    ->middleware('verify.materi.password');

// Secure file download - require password verification
Route::get('/materi/{materiId}/download/{fileId}', [MateriController::class, 'downloadFile'])
    ->name('materi.download')
    ->middleware(['web', 'verify.materi.password']);


// ================= ADMIN PANEL =================
// Admin Login
Route::get('/admin', function() {
    return redirect()->route('admin.dashboard');
});
Route::get('/admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);

// Admin Routes (dengan middleware security)
Route::middleware(['admin.auth', 'admin.security'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // Berita Management
    Route::get('/admin/berita', [AdminController::class, 'beritaIndex'])->name('admin.berita.index');
    Route::get('/admin/berita/create', [AdminController::class, 'beritaCreate'])->name('admin.berita.create');
    Route::post('/admin/berita', [AdminController::class, 'beritaStore'])->name('admin.berita.store');
    Route::get('/admin/berita/{id}/edit', [AdminController::class, 'beritaEdit'])->name('admin.berita.edit');
    Route::post('/admin/berita/{id}', [AdminController::class, 'beritaUpdate'])->name('admin.berita.update');
    Route::post('/admin/berita/{id}/delete', [AdminController::class, 'beritaDelete'])->name('admin.berita.delete');

    // Materi Management
    Route::get('/admin/materi', [AdminController::class, 'materiIndex'])->name('admin.materi.index');
    Route::get('/admin/materi/create', [AdminController::class, 'materiCreate'])->name('admin.materi.create');
    Route::post('/admin/materi', [AdminController::class, 'materiStore'])->name('admin.materi.store');
    Route::get('/admin/materi/{id}/edit', [AdminController::class, 'materiEdit'])->name('admin.materi.edit');
    Route::post('/admin/materi/{id}', [AdminController::class, 'materiUpdate'])->name('admin.materi.update');
    Route::post('/admin/materi/{id}/delete', [AdminController::class, 'materiDelete'])->name('admin.materi.delete');

    // Gallery Management
    Route::get('/admin/galeri', [AdminController::class, 'galeriIndex'])->name('admin.galeri.index');
    Route::get('/admin/galeri/create', [AdminController::class, 'galeriCreate'])->name('admin.galeri.create');
    Route::post('/admin/galeri', [AdminController::class, 'galeriStore'])->name('admin.galeri.store');
    Route::get('/admin/galeri/{id}/manage', [AdminController::class, 'galeriManage'])->name('admin.galeri.manage');
    Route::post('/admin/galeri/{id}/add-images', [AdminController::class, 'galeriAddImages'])->name('admin.galeri.add_images');
    Route::post('/admin/galeri/image/{id}/delete', [AdminController::class, 'galeriDeleteImage'])->name('admin.galeri.delete_image');
    Route::post('/admin/galeri/{id}/delete', [AdminController::class, 'galeriDelete'])->name('admin.galeri.delete');

    // Hero Management
    Route::get('/admin/hero', [AdminController::class, 'heroIndex'])->name('admin.hero.index');
    Route::post('/admin/hero', [AdminController::class, 'heroStore'])->name('admin.hero.store');
    Route::post('/admin/hero/{id}/delete', [AdminController::class, 'heroDelete'])->name('admin.hero.delete');

    // Agenda Management
    Route::get('/admin/agenda', [AdminController::class, 'agendaIndex'])->name('admin.agenda.index');
    Route::get('/admin/agenda/create', [AdminController::class, 'agendaCreate'])->name('admin.agenda.create');
    Route::post('/admin/agenda', [AdminController::class, 'agendaStore'])->name('admin.agenda.store');
    Route::get('/admin/agenda/{id}/edit', [AdminController::class, 'agendaEdit'])->name('admin.agenda.edit');
    Route::post('/admin/agenda/{id}', [AdminController::class, 'agendaUpdate'])->name('admin.agenda.update');
    Route::post('/admin/agenda/{id}/delete', [AdminController::class, 'agendaDelete'])->name('admin.agenda.delete');

    // Map Management
    Route::get('/admin/map', [AdminController::class, 'mapIndex'])->name('admin.map.index');
    Route::post('/admin/map', [AdminController::class, 'mapStore'])->name('admin.map.store');
    Route::post('/admin/map/{id}/delete', [AdminController::class, 'mapDelete'])->name('admin.map.delete');

    // Testimoni Management
    Route::get('/admin/testimoni', [AdminController::class, 'testimoniIndex'])->name('admin.testimoni.index');
    Route::get('/admin/testimoni/create', [AdminController::class, 'testimoniCreate'])->name('admin.testimoni.create');
    Route::post('/admin/testimoni', [AdminController::class, 'testimoniStore'])->name('admin.testimoni.store');
    Route::get('/admin/testimoni/{id}/edit', [AdminController::class, 'testimoniEdit'])->name('admin.testimoni.edit');
    Route::post('/admin/testimoni/{id}', [AdminController::class, 'testimoniUpdate'])->name('admin.testimoni.update');
    Route::post('/admin/testimoni/{id}/delete', [AdminController::class, 'testimoniDelete'])->name('admin.testimoni.delete');
});