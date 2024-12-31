<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\Mahasiswa;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
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
    public function akademik(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nim', $request->input('nama'))->first();
        $data = [
            'nim' => $request->input('nama'),
            'nama' => $mahasiswa->nama,
            'fakultas' => $mahasiswa->fakultas,
            'prodi' => $mahasiswa->prodi,
            'jenis' => 'Akademik',
            'semester' => $request->input('semester'),
            'tahun' => $request->input('tahun'),
            'ips' => $request->input('ips'),
            'terbaik' => $request->input('terbaik'),
            'surat' => $request->file('surat')->storeAs('beasiswa/surat', '[SURAT] ' . $mahasiswa->nama . ' ' . $request->input('terbaik') . '.' . $request->file('surat')->getClientOriginalExtension()),

        ];
        Beasiswa::create($data);
        return back();
        // dd($data);
    }
    public function nonakademik(Request $request)
    {
        $nim = $request->input('nama');
        $prestasiData = Prestasi::where('nim', $nim)->first(); // Ambil data pertama yang cocok

        if ($prestasiData) {
            $data = [
                'nim' => $nim,
                'nama' => $prestasiData->nama,
                'fakultas' => $prestasiData->fakultas,
                'prodi' => $prestasiData->prodi,
                'jenis' => 'Non Akademik',
                'lomba' => $prestasiData->lomba,
                'tahun' => $prestasiData->tahun,
                'prestasi' => $prestasiData->prestasi,
                'tingkat' => $prestasiData->tingkat,
                'sertifikat' => $prestasiData->sertifikat,
                'dokumentasi' => $prestasiData->dokumentasi,
                'foto' => $prestasiData->foto
            ];
            Beasiswa::create($data);
            return back();
        } else {
            dd('Data tidak ditemukan');
        }
    }
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Beasiswa $beasiswa, $jenis)
    {
        if (auth()->check()) {
            if (strpos($jenis, 'non') !== false) {
                $jenis = str_replace('non', 'non ', $jenis);
                $jenis = ucwords($jenis);
            } else {
                $jenis = ucfirst($jenis);
            }

            $beasiswas = Beasiswa::where('jenis', $jenis)->get();
            return view('admin.main', compact('beasiswas', 'jenis'));
        }
    }

    public function showAkademik(Beasiswa $beasiswa)
    {
        $nonakademiks = Beasiswa::where('jenis', 'Non Akademik')->get();
        return view('admin.main', compact('nonakademiks'));
    }

    public function showNonakademik(Beasiswa $beasiswa)
    {
        $nonakademiks = Beasiswa::where('jenis', 'Non Akademik')->get();
        return view('admin.main', compact('nonakademiks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beasiswa $beasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beasiswa $beasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beasiswa $beasiswa, $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        dd($beasiswa);
        try {
            $beasiswa->delete();
            return response()->json(['success' => 'Data dihapus']); // Berikan respon JSON
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal'], 500); // Tangani kesalahan
        }
    }
}
