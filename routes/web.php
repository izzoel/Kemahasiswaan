<?php

use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContentController;
<<<<<<< HEAD
=======
use App\Http\Controllers\KategoriController;
>>>>>>> 740fe1f (add fitur tambah kategori)
use App\Http\Controllers\PostController;
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
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/admin/post/show', [PostController::class, 'show'])->name('show-post');
    Route::post('/admin/post/store', [PostController::class, 'store'])->name('store-post');
    Route::put('/admin/post/update/{id}', [PostController::class, 'update'])->name('update-post');
    Route::get('/admin/post/destroy/{id}', [PostController::class, 'destroy'])->name('delete-post');
<<<<<<< HEAD
=======

    Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('store-kategori');
    Route::get('/admin/kategori/show', [KategoriController::class, 'show'])->name('show-kategori');
    Route::get('/admin/z', [PostController::class, 'kategori']);
>>>>>>> 740fe1f (add fitur tambah kategori)
});
