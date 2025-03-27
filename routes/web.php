<?php

use App\Models\Artikel;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MenuMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/artikel', [LandingController::class, 'index']);
Route::get('/artikel/{slug}', [LandingController::class, 'artikel'])->name('artikel');

Route::get('/kategori/{kategori}', [LandingController::class, 'kategori'])->name('kategori');

Route::post('/login', [LandingController::class, 'login']);
Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
Route::get('/beasiswa', [LandingController::class, 'beasiswa'])->name('beasiswa');
Route::get('/prestasi', [LandingController::class, 'prestasi'])->name('prestasi');
Route::prefix('informasi')->group(function () {
    Route::get('/pedoman', [LandingController::class, 'pedoman'])->name('pedoman');
});

Route::middleware([MenuMiddleware::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        Route::prefix('artikel')->group(function () {
            Route::get('/', [ArtikelController::class, 'index'])->name('admin_artikel');
            Route::get('/table', [ArtikelController::class, 'table']);
            Route::post('/store', [ArtikelController::class, 'store']);
            Route::get('/show/{id}', [ArtikelController::class, 'show']);
            Route::put('/update/{id}', [ArtikelController::class, 'update']);

            Route::post('/kategori', [KategoriController::class, 'kategori']);
            Route::get('/kategori/show', [KategoriController::class, 'show']);
        });
    });
});
