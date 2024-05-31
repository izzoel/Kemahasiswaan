<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use App\Models\Ormawa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\TransaksiKegiatan;

class DanaController extends Controller
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
        // dd($request->input('tanggal_kegiatan'), $request->all());
        // dd($request->all());
        $d = Dana::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'tanggal_kegiatan' => $request->input('tanggal'),
            'id_kegiatan' => $request->input('id_kegiatan'),
            'dana' => $request->input('dana'),
            'berkas' => $request->file('berkas')->storeAs('dana', $request->file('berkas')->getClientOriginalName()),
            'status' => $request->input('status'),

        ]);

        $id_kegiatan = Kegiatan::max('id');
        // dd($id_kegiatan);
        TransaksiKegiatan::create([
            'id_kegiatan' => $id_kegiatan,
            'status' => 'Ditinjau',
            'keterangan' => 'Sedang ditinjau oleh Admin',
        ]);

        Dana::find($id_kegiatan)->update([
            'id_status' => TransaksiKegiatan::max('id'),
        ]);

        // dd($d);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Dana $dana)
    {
        $danas = Dana::all();
        $kegiatans = Kegiatan::all();
        $id_ormawa = Ormawa::value('id');
        return view('admin.main', compact('danas', 'kegiatans', 'id_ormawa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dana $dana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dana $dana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dana $dana, $id)
    {
        Dana::destroy($id);
        return back();
    }
}
