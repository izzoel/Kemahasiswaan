<?php

use App\Models\Artikel;
use App\Models\Prestasi;
use App\Models\Struktur;
use App\Models\Mahasiswa;
use App\Models\Organisasi;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MenuMiddleware;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PedomanController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\OrganisasiController;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/artikel', [LandingController::class, 'index']);
Route::get('/artikel/{slug}', [LandingController::class, 'artikel'])->name('artikel');

Route::get('/kategori/{kategori}', [LandingController::class, 'kategori'])->name('kategori');

Route::post('/login', [LandingController::class, 'login']);
Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
Route::get('/konseling/mahasiswa/select', [LandingController::class, 'konseling_mahasiswa_select']);
Route::post('/konseling/mahasiswa/store', [LandingController::class, 'konseling_mahasiswa_store']);
Route::get('/beasiswa', [LandingController::class, 'beasiswa'])->name('beasiswa');
Route::get('/beasiswa/akademik/select', [LandingController::class, 'beasiswa_akademik_select']);
Route::post('/beasiswa/akademik/store', [LandingController::class, 'beasiswa_akademik_store']);
Route::get('/beasiswa/nonakademik/select', [LandingController::class, 'beasiswa_nonakademik_select']);
Route::post('/beasiswa/nonakademik/store', [LandingController::class, 'beasiswa_nonakademik_store']);
Route::get('/prestasi', [LandingController::class, 'prestasi'])->name('prestasi');
Route::get('/prestasi/mahasiswa/prestasi/{id}', [LandingController::class, 'prestasi_select']);
Route::get('/prestasi/mahasiswa/select', [LandingController::class, 'prestasi_mahasiswa_select']);
Route::post('/prestasi/mahasiswa/store', [LandingController::class, 'prestasi_mahasiswa_store']);
Route::prefix('informasi')->group(function () {
    Route::get('/pedoman', [LandingController::class, 'pedoman'])->name('pedoman');
});
Route::get('/notif/realtime', function () {
    $pendingBeasiswa = \App\Models\Beasiswa::where('status', 'pending')->get();
    $baruKonseling = \App\Models\Konseling::where('status', 'baru')->get();
    $baruDana = \App\Models\Dana::where('status', 'Ditinjau')->get();
    $baruKegiatan = \App\Models\Kegiatan::where('status', 'Ditinjau')->get();
    $jumlahNotif = $pendingBeasiswa->count() + $baruKonseling->count() + $baruDana->count() + $baruKegiatan->count();

    return response()->json([
        'jumlah' => $jumlahNotif
    ]);
});

Route::middleware([MenuMiddleware::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);

        Route::prefix('dashboard')->group(function () {
            Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/chart', [AdminController::class, 'chart']);
        });
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

            Route::prefix('pedoman')->group(function () {
                Route::get('/', [PedomanController::class, 'index'])->name('admin.pedoman');
                Route::get('/table', [PedomanController::class, 'table']);
                Route::post('/store', [PedomanController::class, 'store']);
                Route::get('/show/{id?}', [PedomanController::class, 'show']);
                Route::put('/update/{id}', [PedomanController::class, 'update']);
                Route::delete('/destroy/{id}', [PedomanController::class, 'destroy']);
            });
        });
        Route::prefix('data')->group(function () {
            Route::prefix('struktur')->group(function () {
                Route::get('/', [StrukturController::class, 'index'])->name('admin.struktur');
                Route::get('/table/{id?}', [StrukturController::class, 'table']);
                Route::post('/store', [StrukturController::class, 'store']);
                Route::get('/show/{id?}', [StrukturController::class, 'show']);
                Route::put('/update/{id}', [StrukturController::class, 'update']);
                Route::delete('/destroy/{id}', [StrukturController::class, 'destroy']);
            });
            Route::prefix('program')->group(function () {
                Route::get('/', [ProgramController::class, 'index'])->name('admin.program');
                Route::get('/table/{id?}', [ProgramController::class, 'table']);
                Route::get('/anggaran', [ProgramController::class, 'anggaran']);
                Route::post('/store', [ProgramController::class, 'store']);
                Route::get('/show/{id?}', [ProgramController::class, 'show']);
                Route::put('/update/{id}', [ProgramController::class, 'update']);
                Route::delete('/destroy/{id}', [ProgramController::class, 'destroy']);
            });

            Route::prefix('organisasi')->group(function () {
                Route::get('/', [OrganisasiController::class, 'index'])->name('admin.organisasi');
                Route::get('/table', [OrganisasiController::class, 'table']);
                Route::post('/store', [OrganisasiController::class, 'store']);
                Route::get('/show/{id?}', [OrganisasiController::class, 'show']);
                Route::get('/periode', [OrganisasiController::class, 'periode']);
                Route::put('/update/{id}', [OrganisasiController::class, 'update']);
                Route::delete('/destroy/{id}', [OrganisasiController::class, 'destroy']);
            });
            Route::prefix('mahasiswa')->group(function () {
                Route::get('/', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
                Route::get('/table', [MahasiswaController::class, 'table']);
                Route::post('/store', [MahasiswaController::class, 'store']);
                Route::post('/import', [MahasiswaController::class, 'import']);
                Route::get('/show/{id?}', [MahasiswaController::class, 'show']);
                Route::get('/select', [MahasiswaController::class, 'select']);
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
            Route::prefix('beasiswa')->group(function () {
                Route::get('/', [BeasiswaController::class, 'index'])->name('admin.beasiswa');
                Route::get('/table', [BeasiswaController::class, 'table']);
                Route::post('/store', [BeasiswaController::class, 'store']);
                Route::get('/show/{id?}', [BeasiswaController::class, 'show']);
                Route::put('/update/{id}', [BeasiswaController::class, 'update']);
                Route::delete('/destroy/{id}', [BeasiswaController::class, 'destroy']);
            });
        });
        Route::prefix('layanan')->group(function () {
            Route::prefix('dana')->group(function () {
                Route::get('/', [DanaController::class, 'index'])->name('admin.dana');
                Route::get('/table/{id?}', [DanaController::class, 'table']);
                Route::post('/store', [DanaController::class, 'store']);
                Route::get('/show/{id?}', [DanaController::class, 'show']);
                Route::put('/update/{id}', [DanaController::class, 'update']);
                Route::delete('/destroy/{id}', [DanaController::class, 'destroy']);
            });
            Route::prefix('kegiatan')->group(function () {
                Route::get('/', [KegiatanController::class, 'index'])->name('admin.kegiatan');
                Route::get('/table/{id?}', [KegiatanController::class, 'table']);
                Route::post('/store', [KegiatanController::class, 'store']);
                Route::get('/show/{id?}', [KegiatanController::class, 'show']);
                Route::get('/select/{id}', [KegiatanController::class, 'select']);
                Route::put('/update/{id}', [KegiatanController::class, 'update']);
                Route::delete('/destroy/{id}', [KegiatanController::class, 'destroy']);
            });
            Route::prefix('konseling')->group(function () {
                Route::get('/', [KonselingController::class, 'index'])->name('admin.konseling');
                Route::get('/table/{id?}', [KonselingController::class, 'table']);
                Route::post('/store', [KonselingController::class, 'store']);
                Route::get('/show/{id?}', [KonselingController::class, 'show']);
                Route::get('/select/{id}', [KonselingController::class, 'select']);
                Route::get('/status', [KonselingController::class, 'status']);
                Route::put('/update/{id}', [KonselingController::class, 'update']);
                Route::delete('/destroy/{id}', [KonselingController::class, 'destroy']);
            });
        });
        Route::prefix('profile')->group(function () {
            Route::get('/', [AdminController::class, 'profile'])->name('admin.profile');
            Route::put('/picture/{id}', [AdminController::class, 'picture']);
            Route::put('/password/{id}', [AdminController::class, 'password']);
        });
    });
});
