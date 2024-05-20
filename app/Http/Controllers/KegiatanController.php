<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
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
        if ($request->input('status') == 'Ditinjau') {
            $status = 'Ditinjau';
        } elseif ($request->input('status') == 'Disetujui') {
            $status = 'Disetujui';
        } else {
            $status = 'Ditolak';
        }
        Kegiatan::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'tanggal' => $request->input('tanggal'),
            'nama' => $request->input('nama'),
            'anggaran' => $request->input('anggaran'),
            'berkas' => $request->file('berkas')->storeAs('kegiatan', $request->file('berkas')->getClientOriginalName()),
            'status' => $status,
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        if (auth()->user()->role == 'admin') {
            $kegiatan = Kegiatan::all();
        } else {
            $kegiatan = Kegiatan::where('id_ormawa', auth()->user()->id)->get();
        }
        $kegiatans = $kegiatan;

        return view('admin.main', compact('kegiatans'));
    }
    public function showEdit(Kegiatan $kegiatan)
    {
        if (auth()->user()->role == 'admin') {
            $kegiatan = Kegiatan::all();
        } else {
            $kegiatan = Kegiatan::where('id_ormawa', auth()->user()->id)->get();
        }
        $kegiatans = $kegiatan;
        // $kegiatans = Kegiatan::all();
        return response($kegiatans);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if ($request->hasFile('berkasEdit')) {
            $berkas = $request->file('berkasEdit')->storeAs('kegiatan', $request->file('berkasEdit')->getClientOriginalName());
        } else {
            $berkas = $request->input('berkas');
        }


        $data = [
            'nama' => $request->input('namaEdit'),
            'tanggal' => $request->input('tanggalEdit'),
            'berkas' => $berkas,
        ];

        Kegiatan::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kegiatan::destroy($id);
        return back();
    }
}
