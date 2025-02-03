<?php

namespace App\Http\Controllers;

use App\Models\Ormawa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\TransaksiStatus;

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
        $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;
        Kegiatan::create([
            'id_ormawa' => $id_ormawa,
            'tanggal' => $request->input('tanggal'),
            'nama' => $request->input('nama'),
            'anggaran' => $request->input('anggaran'),
            'berkas' => $request->file('berkas')->storeAs('kegiatan', $request->file('berkas')->getClientOriginalName()),
            'status' => 'Ditinjau',
        ]);

        $id_transaksi = Kegiatan::max('id');
        TransaksiStatus::create([
            'pengajuan' => 'Kegiatan',
            'id_transaksi' => $id_transaksi,
            'status' => 'Ditinjau',
            'keterangan' => 'Sedang ditinjau oleh Admin',
        ]);

        Kegiatan::find($id_transaksi)->update([
            'id_status' => TransaksiStatus::max('id'),
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
            $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;
            $kegiatan = Kegiatan::where('id_ormawa', $id_ormawa)->get();
        }
        $kegiatans = $kegiatan;
        $status = TransaksiStatus::all();
        return view('admin.main', compact('kegiatans', 'status'));
    }
    public function showEdit(Kegiatan $kegiatan)
    {
        if (auth()->user()->role == 'admin') {
            $kegiatan = Kegiatan::all();
        } else {
            $id_ormawa = Ormawa::where('kode_ormawa', auth()->user()->kode)->first()->id;
            $kegiatan = Kegiatan::where('id_ormawa', $id_ormawa)->get();
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
        if ($request->input('status') == 'Ditinjau') {
            $status = 'Ditinjau';
        } elseif ($request->input('status') == 'Disetujui') {
            $status = 'Disetujui';
        } elseif ($request->input('status') == 'Ditolak') {
            $status = 'Ditolak';
        } else {
            $status = 'Ditinjau';
        }

        if ($request->hasFile('berkasEdit')) {
            $berkas = $request->file('berkasEdit')->storeAs('kegiatan', $request->file('berkasEdit')->getClientOriginalName());
        } else {
            $berkas = $request->input('berkas');
        }

        if (auth()->user()->role == 'admin') {
            $data = [
                'status' => $status,
            ];

            TransaksiStatus::find($id)->update([
                'status' => $status,
                'keterangan' => $request->input('keterangan'),
            ]);

            $id = $request->input('id_kegiatan');
        } else {
            $data = [
                'nama' => $request->input('namaEdit'),
                'tanggal' => $request->input('tanggalEdit'),
                'anggaran' => $request->input('anggaranEdit'),
                'berkas' => $berkas,
                'status' => 'Ditinjau',
            ];
        }
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
