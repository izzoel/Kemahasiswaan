<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class PrestasiController extends Controller
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
    public function lomba($id)
    {
        $lomba = Prestasi::Where('nim', $id)->get();
        return response()->json($lomba);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nims = $request->input('nama');
        $id_prestasi = Prestasi::get('id_prestasi')->max('id_prestasi') + 1;
        foreach ($nims as $nim) {
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();
            $nama = $mahasiswa->nama;
            $fakultas = $mahasiswa->fakultas;
            $prodi = $mahasiswa->prodi;
            Prestasi::create([
                'id_prestasi' => $id_prestasi,
                'nim' => $nim,
                'nama' => $nama,
                'fakultas' => $fakultas,
                'prodi' => $prodi,
                'tahun' => $request->input('tahun'),
                'lomba' => $request->input('lomba'),
                'jenis' => $request->input('jenis'),
                'tingkat' => $request->input('tingkat'),
                'prestasi' => $request->input('prestasi'),
                'sertifikat' => $request->file('sertifikat')->storeAs('prestasi/sertifikat', '[SERTIFIKAT] ' . $nama . ' ' . $request->input('lomba') . '.' . $request->file('sertifikat')->getClientOriginalExtension()),
                'dokumentasi' => $request->file('dokumentasi')->storeAs('prestasi/dokumentasi', '[DOKUMENTASI] ' . $nama . ' ' . $request->input('lomba') . '.' . $request->file('dokumentasi')->getClientOriginalExtension()),
                'foto' => $request->file('foto')->storeAs('prestasi/foto', '[FOTO] ' . $nama . ' ' . $request->input('lomba') . '.' . $request->file('foto')->getClientOriginalExtension()),
            ]);
        }
        // dd($request->all(), $request->input('nama'), $mahasiswa, $id_prestasi);
        // dd($id_prestasi);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        $prestasis = Prestasi::all();
        return view('admin.main', compact('prestasis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
