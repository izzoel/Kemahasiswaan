<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
        public function index()
        {
                $posts = Post::all();
                $informasi_terbaru = Post::orderBy('updated_at', 'desc')->get();

                return view('landing', compact('posts', 'informasi_terbaru'));
        }
}
