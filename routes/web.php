<?php

use App\Models\Periode;
use App\Models\TransaksiKegiatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\OrmawaController;
use App\Http\Controllers\ProkerController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\TransaksiStatusController;
use Illuminate\Routing\Route as RoutingRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('landing');
// })->name('landing');

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/prestasi', [LandingController::class, 'prestasi'])->name('prestasi');
Route::get('/prestasi/mahasiswa', [MahasiswaController::class, 'select'])->name('select-mahasiswa');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('galeries');

Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/login', [AdminController::class, 'login'])->name('login');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('main');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/admin/artikel/show', [ArtikelController::class, 'show'])->name('show-artikel');
    Route::get('/admin/artikel/show/edit', [ArtikelController::class, 'showEdit'])->name('show-edit-artikel');
    Route::post('/admin/artikel/store', [ArtikelController::class, 'store'])->name('store-artikel');
    Route::put('/admin/artikel/update/{id}', [ArtikelController::class, 'update'])->name('update-artikel');
    Route::get('/admin/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('delete-artikel');

    Route::get('/admin/galeri/show', [GaleriController::class, 'show'])->name('show-galeri');
    Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('store-galeri');
    Route::put('/admin/galeri/update/{id}', [GaleriController::class, 'update'])->name('update-galeri');
    Route::get('/admin/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('delete-galeri');

    Route::get('/admin/kategori/show', [KategoriController::class, 'show'])->name('show-kategori');
    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('store-kategori');
    Route::get('/admin/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');

    Route::get('/admin/ormawa/show', [OrmawaController::class, 'show'])->name('show-ormawa');
    Route::post('/admin/ormawa/show', [OrmawaController::class, 'show'])->name('show-ormawa');
    Route::post('/admin/ormawa/store', [OrmawaController::class, 'store'])->name('store-ormawa');
    Route::put('/admin/ormawa/update/{id}', [OrmawaController::class, 'update'])->name('update-ormawa');
    Route::get('/admin/ormawa/destroy/{id}', [OrmawaController::class, 'destroy'])->name('delete-ormawa');

    Route::get('/admin/ormawa/proker/show', [ProkerController::class, 'show'])->name('show-proker');
    Route::post('/admin/ormawa/proker/store', [ProkerController::class, 'store'])->name('store-proker');
    Route::put('/admin/ormawa/proker/update/{id}', [ProkerController::class, 'update'])->name('update-proker');
    Route::get('/admin/ormawa/proker/destroy/{id}', [ProkerController::class, 'destroy'])->name('delete-proker');

    Route::get('/admin/ormawa/struktur/show', [StrukturController::class, 'show'])->name('show-struktur');
    Route::post('/admin/ormawa/struktur/store', [StrukturController::class, 'store'])->name('store-struktur');
    Route::put('/admin/ormawa/struktur/update/{id}', [StrukturController::class, 'update'])->name('update-struktur');
    Route::get('/admin/ormawa/struktur/destroy/{id}', [StrukturController::class, 'destroy'])->name('delete-struktur');

    Route::get('/admin/ormawa/periode/show', [PeriodeController::class, 'show'])->name('show-periode');
    Route::post('/admin/ormawa/periode/store', [PeriodeController::class, 'store'])->name('store-periode');
    Route::put('/admin/ormawa/periode/update/{id}', [PeriodeController::class, 'update'])->name('update-periode');
    Route::get('/admin/ormawa/periode/destroy/{id}', [PeriodeController::class, 'destroy'])->name('delete-periode');

    Route::get('/admin/kegiatan/show', [KegiatanController::class, 'show'])->name('show-kegiatan');
    Route::get('/admin/kegiatan/show/edit', [KegiatanController::class, 'showEdit'])->name('show-edit-kegiatan');
    Route::post('/admin/kegiatan/store', [KegiatanController::class, 'store'])->name('store-kegiatan');
    Route::put('/admin/kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('update-kegiatan');
    Route::get('/admin/kegiatan/destroy/{id}', [KegiatanController::class, 'destroy'])->name('delete-kegiatan');

    Route::get('/admin/dana/show', [DanaController::class, 'show'])->name('show-dana');
    Route::post('/admin/dana/store', [DanaController::class, 'store'])->name('store-dana');
    Route::put('/admin/dana/update/{id}', [DanaController::class, 'update'])->name('update-dana');
    Route::get('/admin/dana/destroy/{id}', [DanaController::class, 'destroy'])->name('delete-dana');

    Route::get('/admin/mahasiswa/show', [MahasiswaController::class, 'show'])->name('show-mahasiswa');
    Route::post('/admin/mahasiswa/store', [MahasiswaController::class, 'store'])->name('store-mahasiswa');
    Route::post('/import/mahasiswa/import', [MahasiswaController::class, 'import'])->name('import-mahasiswa');
});
