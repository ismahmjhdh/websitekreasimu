<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('beranda');
});

Route::get('/beranda', function () {
    return view('beranda');
})->name('beranda');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/galeri', function (\Illuminate\Http\Request $request) {
    $type = $request->query('type');
    $query = \App\Models\Galeri::latest('created_at');
    
    if ($type) {
        $query->where('type', $type);
    }
    
    $galeris = $query->paginate(9);
    return view('galeri', compact('galeris', 'type'));
})->name('galeri');

Route::get('/galeri1', function () {
    return view('galeri1');
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
    Route::post('/admin/galeri/{id}/delete', [AdminController::class, 'galeriDelete'])->name('admin.galeri.delete');
});