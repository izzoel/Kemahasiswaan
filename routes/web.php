<?php

use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::get('/login', [AdminController::class, 'login'])->name('login');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('main');
    // Route::get('/admin', [AdminController::class, 'index'])->name('show-artikel');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');


    Route::get('/admin/artikel/show', [ArtikelController::class, 'show'])->name('show-artikel');
    Route::get('/admin/artikel/show/edit', [ArtikelController::class, 'showEdit'])->name('show-edit-artikel');
    Route::post('/admin/artikel/store', [ArtikelController::class, 'store'])->name('store-artikel');
    Route::put('/admin/artikel/update/{id}', [ArtikelController::class, 'update'])->name('update-artikel');
    Route::get('/admin/artikel/destroy/{id}', [ArtikelController::class, 'destroy'])->name('delete-artikel');

    Route::get('/admin/galeri/show', [GaleriController::class, 'show'])->name('show-galeri');
    Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('store-galeri');


    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('store-kategori');
    Route::get('/admin/kategori/show', [KategoriController::class, 'show'])->name('show-kategori');
    Route::get('/admin/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('delete-kategori');
});
