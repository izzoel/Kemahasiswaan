<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Proker;
use Illuminate\Http\Request;

class ProkerController extends Controller
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
        Proker::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'nama' => $request->input('nama'),
            'tanggal' => $request->input('tanggal'),
            'anggaran' => $request->input('anggaran'),
            'keterangan' => $request->input('keterangan'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Proker $proker)
    {
        $prokers = Proker::all();
        if (auth()->user()->role == 'ormawa') {
            $anggaran = Ormawa::find(auth()->user()->id)->anggaran;
        } elseif (auth()->user()->role == 'admin') {
            $anggaran = 0;
        }

        return view('admin.main', compact('prokers', 'anggaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proker $proker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proker $proker, $id)
    {
        $data = [
            'nama' => $request->input('namaEdit'),
            'tanggal' => $request->input('tanggalEdit'),
            'anggaran' => $request->input('anggaranEdit'),
            'keterangan' => $request->input('keteranganEdit'),
        ];
        Proker::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proker $proker, $id)
    {
        Proker::destroy($id);
        return back();
    }
}
