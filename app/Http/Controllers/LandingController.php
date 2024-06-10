<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
        public function index()
        {
                $artikels = Artikel::paginate(2);
                $informasi_terbaru = Artikel::orderBy('updated_at', 'desc')->get();

                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('landing', compact('artikels', 'informasi_terbaru', 'galeris'));
        }


        public function prestasi()
        {
                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('prestasi', compact('galeris'));
        }
        public function galeri()
        {
                $galeris = Galeri::orderBy('updated_at', 'desc')->take(4)->get();
                return view('galeries', compact('galeris'));
        }
}
