<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ormawa;
use App\Models\Periode;

use Illuminate\Http\Request;
use function Laravel\Prompts\password;

class OrmawaController extends Controller
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
        // $password = bcrypt($request->input('username'));
        // dd($request->all(), $password);
        Ormawa::create([
            'nama' => $request->input('nama'),
            'logo' => $request->file('logo')->storeAs('ormawa', '[LOGO] ' . $request->input('nama') . '.jpg'),
            'keterangan' => $request->input('keterangan'),
            'id_periode' => $request->input('id_periode'),
            'anggaran' => $request->input('anggaran'),
        ]);

        User::create([
            'username' => $request->input('username'),
            'role' => 'ormawa',
            'password' => bcrypt($request->input('password')),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Ormawa $ormawa, Request $request)
    {
        if (is_null($request->input('periodePilih'))) {
            $periode_pilih = Periode::orderBy('periode', 'desc')->value('periode');
        } else {
            $periode_pilih = Periode::where('periode', $request->input('periodePilih'))->value('periode');
            // dd($periode_pilih);
        }

        $periodes = Periode::all();

        // $periode_pilih = Periode::orderBy('periode', 'desc')->value('periode');
        $id_periode = Periode::orderBy('periode', 'desc')->value('id');
        $id_periode = Periode::where('periode', $periode_pilih)->value('id');
        $ormawas = Ormawa::where('id_periode', $id_periode)->get();
        // dd($ormawas);
        return view('admin.main', compact('ormawas', 'periodes', 'periode_pilih'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ormawa $ormawa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        if ($request->hasFile('logoEdit')) {
            $logo = $request->file('logoEdit')->storeAs('ormawa', '[LOGO] ' . $request->input('namaEdit') . '.jpg');
        } else {
            $logo = $request->input('logo');
        }

        // dd($request->input('usernameEdit'));

        if ($request->input('passwordEdit') != null) {
            User::where('id', auth()->user()->id)->update([
                'password' => bcrypt($request->input('passwordEdit')),
            ]);
        }

        $data = [
            'nama' => $request->input('namaEdit'),
            'logo' => $logo,
            'keterangan' => $request->input('keteranganEdit'),
            'anggaran' => $request->input('anggaranEdit'),
            'id_periode' => $request->input('periodeEdit'),
        ];

        Ormawa::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Ormawa::destroy($id);
        return back();
    }
}
