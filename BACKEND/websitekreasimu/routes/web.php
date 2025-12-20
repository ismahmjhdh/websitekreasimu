<?php

use Illuminate\Support\Facades\Route;

// berita
Route::get('/berita', [AdminBeritaController::class, 'index']);
Route::get('/berita/{id}', [AdminBeritaController::class, 'show']);

// materi
Route::get('/materi', [AdminMateriController::class, 'index']);
Route::get('/materi/{id}', [AdminMateriController::class, 'show']);
Route::post('/materi/{id}/verify', [AdminMateriController::class, 'verify']);

Route::middleware('web')->group(function () {
    Route::post('/admin/berita', [AdminBeritaController::class, 'store']);
    Route::post('/admin/materi', [AdminMateriController::class, 'store']);

Route::get('/', function () {
    return view('home');
});

Route::get('/news', function () {
    return view('berita');
});

Route::get('/materi', function () {
    return view('materi');
});

});


