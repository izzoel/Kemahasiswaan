<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use App\Models\Ormawa;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\TransaksiStatus;

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
        Dana::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'tanggal_kegiatan' => $request->input('tanggal'),
            'id_kegiatan' => $request->input('id_kegiatan'),
            'dana' => $request->input('dana'),
            'berkas' => $request->file('berkas')->storeAs('dana', $request->file('berkas')->getClientOriginalName()),
            'status' => $request->input('status'),
        ]);

        $id_transaksi = Kegiatan::max('id');
        // dd($id_kegiatan);
        TransaksiStatus::create([
            'pengajuan' => 'Dana',
            'id_transaksi' => $id_transaksi,
            'status' => 'Ditinjau',
            'keterangan' => 'Sedang ditinjau oleh Admin',
        ]);

        Dana::find($id_transaksi)->update([
            'id_status' => TransaksiStatus::max('id'),
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
    public function update(Request $request, Dana $dana, $id)
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

            // TransaksiKegiatan::create([
            //     'id_kegiatan' => $request->input('id_kegiatan'),
            //     'status' => $status,
            //     'keterangan' => $request->input('keterangan'),
            // ]);
        } else {
            $data = [
                'nama' => $request->input('namaEdit'),
                'tanggal' => $request->input('tanggalEdit'),
                'berkas' => $berkas,
                'status' => 'Ditinjau',
            ];
        }


        // dd($request->input('id_dana'));
        Dana::find($request->input('id_dana'))->update($data);
        return back();
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
