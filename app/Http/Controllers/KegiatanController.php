<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\TransaksiKegiatan;
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
        Kegiatan::create([
            'id_ormawa' => $request->input('id_ormawa'),
            'tanggal' => $request->input('tanggal'),
            'nama' => $request->input('nama'),
            'anggaran' => $request->input('anggaran'),
            'berkas' => $request->file('berkas')->storeAs('kegiatan', $request->file('berkas')->getClientOriginalName()),
            'status' => 'Ditinjau',
        ]);

        $id_kegiatan = Kegiatan::max('id');
        // dd($id_kegiatan);
        TransaksiKegiatan::create([
            'id_kegiatan' => $id_kegiatan,
            'status' => 'Ditinjau',
            'keterangan' => 'Sedang ditinjau oleh Admin',
        ]);

        Kegiatan::find($id_kegiatan)->update([
            'id_status' => TransaksiKegiatan::max('id'),
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
        $status = TransaksiKegiatan::all();
        return view('admin.main', compact('kegiatans', 'status'));
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

            TransaksiKegiatan::find($id)->update([
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
