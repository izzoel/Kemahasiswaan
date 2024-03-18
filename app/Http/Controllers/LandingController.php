<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $informasi_terbaru = Post::orderBy('updated_at', 'desc')->get();

<<<<<<< HEAD
        $kategori = Post::distinct()->get(['kategori']);

        $count_kategori = Post::distinct()->get(['kategori'])->count('kategori');
=======
        $kategori = Post::distinct()->get(['id_kategori']);

        $count_kategori = Post::distinct()->get(['id_kategori'])->count('kategori');
>>>>>>> 740fe1f (add fitur tambah kategori)


        return view('landing', compact('posts', 'informasi_terbaru', 'kategori', 'count_kategori'));
    }
}
