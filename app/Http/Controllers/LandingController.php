<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LandingController extends Controller
{
    public function index()
    {
        return view('guest.section.section');
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
