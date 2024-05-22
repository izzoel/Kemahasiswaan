<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use Illuminate\Http\Request;

class PeriodeController extends Controller
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
        Periode::create([
            'periode' => $request->input('periode'),
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        $periode = Periode::all();
        return response()->json($periode);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periode $periode, $id)
    {
        $data = [
            'periode' => $request->input('periodeEdit'),
        ];
        Periode::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
