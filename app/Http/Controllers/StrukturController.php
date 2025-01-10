<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Struktur;
use App\Models\Mahasiswa;
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
        $mahasiswa = Mahasiswa::where('nim', $request->input('mahasiswa'))->first()->nama;
        $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;

        Struktur::create([
            'id_ormawa' => $id_ormawa,
            'mahasiswa' => $mahasiswa,
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
        $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;
        $strukturs = Struktur::where('id_ormawa', $id_ormawa)->get();
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

        $mahasiswa = Mahasiswa::where('nim', $request->input('mahasiswaEdit'))->first()->nama;

        $data = [
            'mahasiswa' => $mahasiswa,
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
