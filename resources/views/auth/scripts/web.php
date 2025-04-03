<?php

use App\Models\Artikel;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MenuMiddleware;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrganisasiController;

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

        Route::prefix('post')->group(function () {
            Route::prefix('artikel')->group(function () {
                Route::get('/', [ArtikelController::class, 'index'])->name('admin.artikel');
                Route::get('/table', [ArtikelController::class, 'table']);
                Route::post('/store', [ArtikelController::class, 'store']);
                Route::get('/show/{id}', [ArtikelController::class, 'show']);
                Route::put('/update/{id}', [ArtikelController::class, 'update']);
                Route::delete('/destroy/{id}', [ArtikelController::class, 'destroy']);
            });

            Route::prefix('kategori')->group(function () {
                Route::get('/', [KategoriController::class, 'index'])->name('admin.kategori');
                Route::get('/table', [KategoriController::class, 'table']);
                Route::post('/store', [KategoriController::class, 'store']);
                Route::get('/show/{id?}', [KategoriController::class, 'show']);
                Route::put('/update/{id}', [KategoriController::class, 'update']);
                Route::delete('/destroy/{id}', [KategoriController::class, 'destroy']);
            });
        });

        Route::prefix('data')->group(function () {
            Route::prefix('organisasi')->group(function () {
                Route::get('/', [OrganisasiController::class, 'index'])->name('admin.organisasi');
                Route::get('/table', [OrganisasiController::class, 'table']);
                Route::post('/store', [OrganisasiController::class, 'store']);
                Route::get('/show/{id?}', [OrganisasiController::class, 'show']);
                Route::put('/update/{id}', [OrganisasiController::class, 'update']);
                Route::delete('/destroy/{id}', [OrganisasiController::class, 'destroy']);
            });
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
                Route::get('/table', [MahasiswaController::class, 'table']);
                Route::post('/store', [MahasiswaController::class, 'store']);
                Route::post('/import', [MahasiswaController::class, 'import']);
                Route::get('/show/{id?}', [MahasiswaController::class, 'show']);
                Route::put('/update/{id}', [MahasiswaController::class, 'update']);
                Route::delete('/destroy/{id}', [MahasiswaController::class, 'destroy']);
            });
            Route::prefix('prestasi')->group(function () {
                Route::get('/', [PrestasiController::class, 'index'])->name('admin.prestasi');
                Route::get('/table', [PrestasiController::class, 'table']);
                Route::post('/store', [PrestasiController::class, 'store']);
                Route::get('/show/{id?}', [PrestasiController::class, 'show']);
                Route::put('/update/{id}', [PrestasiController::class, 'update']);
                Route::delete('/destroy/{id}', [PrestasiController::class, 'destroy']);
            });
        });
        Route::prefix('layanan')->group(function () {
            Route::prefix('dana')->group(function () {
                Route::get('/', [DanaController::class, 'index'])->name('admin.dana');
                Route::get('/table', [DanaController::class, 'table']);
                Route::post('/store', [DanaController::class, 'store']);
                Route::get('/show/{id?}', [DanaController::class, 'show']);
                Route::put('/update/{id}', [DanaController::class, 'update']);
                Route::delete('/destroy/{id}', [DanaController::class, 'destroy']);
            });
            Route::prefix('kegiatan')->group(function () {
                Route::get('/', [KegiatanController::class, 'index'])->name('admin.kegiatan');
                Route::get('/table', [KegiatanController::class, 'table']);
                Route::post('/store', [KegiatanController::class, 'store']);
                Route::get('/show/{id?}', [KegiatanController::class, 'show']);
                Route::put('/update/{id}', [KegiatanController::class, 'update']);
                Route::delete('/destroy/{id}', [KegiatanController::class, 'destroy']);
            });
        });
    });
});
