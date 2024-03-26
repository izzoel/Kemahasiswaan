<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
use App\Models\Kegiatan;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Dana $dana)
    {
        $danas = Dana::all();
        $kegiatans = Kegiatan::all();
        return view('admin.main', compact('danas', 'kegiatans'));
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
