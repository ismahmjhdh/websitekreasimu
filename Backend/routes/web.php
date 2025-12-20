<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',function (){
    return view('beranda');
});

Route::get('/beranda',function (){
    return view('beranda');
})->name('beranda');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');


Route::get('/materi', function () {
    return view('materi');
})->name('materi');


Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');
