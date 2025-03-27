<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $artikels = Artikel::paginate(2);
        $kategoris = Artikel::all();
        $informasi_terbaru = Artikel::orderBy('updated_at', 'desc')->get();

        if ($request->ajax()) {
            return view('guest.section.section', compact('artikels', 'informasi_terbaru', 'kategoris'))->render();
        }

        return view('guest.section.section', compact('artikels', 'informasi_terbaru', 'kategoris'));
    }

    public function artikel($slug)
    {
        $artikels = Artikel::where('slug', $slug)->first();
        return view('guest.section.section', compact('artikels'));
    }

    public function kategori($kategori)
    {
        $kategoris = Kategori::where('kategori', $kategori)->first();
        $artikels = Artikel::where('id_kategori', $kategoris->id)->get();
        return view('guest.section.section', compact('artikels'));
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            Session::put('username', $request->username);
            Session::put('password', $request->password);
            return response()->json(['success' => true, 'message' => 'Sukses']);
        } else {
            // return response()->json(['success' => false, 'message' => Auth::attempt(['name' => $request->username, 'password' => $request->password]) . 'Gagal :' . $request->username . ' ' . $request->password]);
            return response()->json(['success' => false, 'message' => 'Gagal']);
        }
    }
    public function pedoman()
    {
        return view('guest.' . request()->segment(1) . '.' . request()->segment(2));
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('landing');
    }
}
