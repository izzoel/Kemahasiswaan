<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Imports\ImportMahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
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

    public function import()
    {
        Excel::import(new ImportMahasiswa, request()->file('excel'));
        // $a = Excel::import(new Mahasiswa, request()->file('excel'));
        // dd($a);
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'fakultas' => $request->input('fakultas'),
            'prodi' => $request->input('prodi'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        $mahasiswas = Mahasiswa::all();
        return view('admin.main', compact('mahasiswas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
