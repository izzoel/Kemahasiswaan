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
        // dd(Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->anggaran, $request->input('anggaran'));
        $anggaran_awal = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->anggaran;
        $anggaran_input = $request->input('anggaran');

        // Convert Rupiah strings to integers
        $anggaran_awal_nominal = intval(str_replace(['Rp', '.', ' '], '', $anggaran_awal));
        $anggaran_input_nominal = intval(str_replace(['Rp', '.', ' '], '', $anggaran_input));

        // Subtract the input anggaran from the initial anggaran
        $sisa_anggaran_nominal = $anggaran_awal_nominal - $anggaran_input_nominal;

        // Convert the result back to Rupiah format
        $sisa_anggaran = 'Rp ' . number_format($sisa_anggaran_nominal, 0, ',', '.');

        $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;
        Proker::create([
            'id_ormawa' => $id_ormawa,
            'nama' => $request->input('proker'),
            'tanggal' => $request->input('tanggal'),
            'anggaran' => $request->input('anggaran'),
            'keterangan' => $request->input('keterangan'),
        ]);

        Ormawa::find($id_ormawa)->update([
            'anggaran' => $sisa_anggaran,
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
            $anggaran = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->anggaran;
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
            'nama' => $request->input('prokerEdit'),
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
        $anggaran_awal = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->anggaran;
        $anggaran_input = Proker::where('id', $id)->first()->anggaran;

        // Convert Rupiah strings to integers
        $anggaran_awal_nominal = intval(str_replace(['Rp', '.', ' '], '', $anggaran_awal));
        $anggaran_input_nominal = intval(str_replace(['Rp', '.', ' '], '', $anggaran_input));

        // Subtract the input anggaran from the initial anggaran
        $sisa_anggaran_nominal = $anggaran_awal_nominal + $anggaran_input_nominal;

        // Convert the result back to Rupiah format
        $sisa_anggaran = 'Rp ' . number_format($sisa_anggaran_nominal, 0, ',', '.');
        $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;

        Ormawa::find($id_ormawa)->update([
            'anggaran' => $sisa_anggaran,
        ]);

        Proker::destroy($id);
        return back();
    }
}
