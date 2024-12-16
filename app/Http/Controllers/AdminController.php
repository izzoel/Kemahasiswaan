<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('admin/artikel/show');
        } elseif (auth()->user()->role == 'ormawa') {
            return redirect('/admin/ormawa/struktur/show');
        } elseif (auth()->user()->role == 'prodi') {
            return redirect()->route('show-beasiswa', 'akademik');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }

    public function login(Request $request,)
    {
        $credentials = $request->only('username', 'password');
        if (auth()->attempt($credentials)) {
            // dd($credentials);
            // Jika otentikasi berhasil
            return redirect()->intended('admin');
        }

        // Jika otentikasi gagal
        // dd($credentials);
        return redirect()->route('landing')->with('error', 'Username atau password salah.');
    }

    public function beasiswa(Request $request)
    {
        $credentials = $request->only('username', 'password');
        dd($credentials);

        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $validated['username'])
            ->where('password', $validated['password']) // Pastikan hashing password diimplementasikan.
            ->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        if ($user->role !== 'prodi') {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json(['message' => 'Login successful', 'user' => $user], 200);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('landing');
    }
}
