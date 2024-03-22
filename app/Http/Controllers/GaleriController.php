<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Kategori;
use Illuminate\Http\Request;

class GaleriController extends Controller
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
        //   $konten = $request->input('konten');
        // $konten = !empty($konten) ? $konten : ' ';

        // $excerpt = $request->input('excerpt');
        // $excerpt = !empty($excerpt) ? $excerpt : ' ';

        // Artikel::create([
        //     'judul' => $request->input('judul'),
        //     'konten' => $konten,
        //     'excerpt' => $excerpt,
        //     'id_kategori' => $request->input('kategori'),
        //     'thumbnail' => $request->file('thumbnail')->storeAs('thumbnail', $request->file('thumbnail')->getClientOriginalName())
        // ]);
        // return back();

        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        //
        $galeris = Galeri::all();
        $kategoris = Kategori::all();
        return view('admin.main', compact('galeris', 'kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        //
    }
}
