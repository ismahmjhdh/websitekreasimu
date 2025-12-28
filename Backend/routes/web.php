<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\MateriController;

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

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');


// ================= BERITA =================
Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita');

Route::get('/berita/create', [BeritaController::class, 'create'])
    ->name('berita.create');

Route::post('/berita', [BeritaController::class, 'store'])
    ->name('berita.store');

Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');



// ================= MATERI =================
Route::get('/materi', [MateriController::class, 'index'])
    ->name('materi');

Route::get('/materi/create', [MateriController::class, 'create'])
    ->name('materi.create');

Route::post('/materi', [MateriController::class, 'store'])
    ->name('materi.store');

Route::get('/materi/{id}', [MateriController::class, 'show'])
    ->name('materi.show');