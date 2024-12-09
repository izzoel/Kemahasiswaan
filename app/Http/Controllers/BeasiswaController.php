<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
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
    public function nonakademik(Request $request)
    {
        $nim = $request->input('nama');
        $prestasiData = Prestasi::where('nim', $nim)->first(); // Ambil data pertama yang cocok

        if ($prestasiData) {
            $data = [
                'nim' => $nim,
                'nama' => $prestasiData->nama,
                'lomba' => $prestasiData->lomba,
                'tahun' => $prestasiData->tahun,
                'prestasi' => $prestasiData->prestasi,
                'tingkat' => $prestasiData->tingkat,
                'sertifikat' => $prestasiData->sertifikat,
                'dokumentasi' => $prestasiData->dokumentasi,
                'foto' => $prestasiData->foto
            ];

            dd($data); // Debugging output
        } else {
            // Tangani jika data tidak ditemukan
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
    public function show(Beasiswa $beasiswa)
    {
        //
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
    public function destroy(Beasiswa $beasiswa)
    {
        //
    }
}
