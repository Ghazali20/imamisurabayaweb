<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\PublicPostController;
use Illuminate\Support\Facades\Route;

// Halaman utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Route Halaman Kabar & Artikel Komunitas (Arsip Blog)
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// Route Detail Baca Artikel / Blog Komunitas
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Route Form Kirim Kabar / Artikel Publik
Route::get('/tulis-kabar', [PublicPostController::class, 'create'])->name('blog.create');
Route::post('/tulis-kabar', [PublicPostController::class, 'store'])->name('blog.store');

// Route Halaman Galeri Kegiatan Publik
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Route Halaman Profil Tentang Kami
Route::get('/tentang-kami', [AboutController::class, 'index'])->name('about.index');

// Route Halaman Program Kerja
Route::get('/program-kerja', [ProgramController::class, 'index'])->name('programs.index');

// Rute Pengelolaan Admin Program Kerja
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/program-kerja', [ProgramController::class, 'adminIndex'])->name('admin.programs.index');
    Route::post('/admin/program-kerja', [ProgramController::class, 'store'])->name('admin.programs.store');
    Route::put('/admin/program-kerja/{id}', [ProgramController::class, 'update'])->name('admin.programs.update');
    Route::delete('/admin/program-kerja/{id}', [ProgramController::class, 'destroy'])->name('admin.programs.destroy');
});

// Route Google OAuth
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);