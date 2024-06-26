<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Struktur::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'mahasiswa' => $request->input('mahasiswa'),
            'jabatan' => $request->input('jabatan'),
            'prodi' => $request->input('prodi'),
            'profil' => $request->file('profil')->storeAs('profil', $request->file('profil')->getClientOriginalName()),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Struktur $struktur)
    {
        $strukturs = Struktur::where('id_ormawa', auth()->user()->id)->get();
        return view('admin.main', compact('strukturs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Struktur $struktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Struktur $struktur, $id)
    {
        if ($request->hasFile('profilEdit')) {
            $profil = $request->file('profilEdit')->storeAs('profil', $request->file('profilEdit')->getClientOriginalName());
        } else {
            $profil = $request->input('profil');
        }

        $data = [
            'mahasiswa' => $request->input('mahasiswaEdit'),
            'jabatan' => $request->input('jabatanEdit'),
            'prodi' => $request->input('prodiEdit'),
            'kategori' => $request->input('kategoriEdit'),
            'profil' => $profil,
        ];

        Struktur::find($id)->update($data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Struktur $struktur, $id)
    {
        Struktur::destroy($id);
        return back();
    }
}
