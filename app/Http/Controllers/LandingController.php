<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
        public function index()
        {
                $artikels = Artikel::paginate(2);
                $informasi_terbaru = Artikel::orderBy('updated_at', 'desc')->get();

                return view('landing', compact('artikels', 'informasi_terbaru'));
        }
}
