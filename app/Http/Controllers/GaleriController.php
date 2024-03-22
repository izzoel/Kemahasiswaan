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
        $konten = $request->input('konten');
        $konten = !empty($konten) ? $konten : ' ';

        $excerpt = $request->input('excerpt');
        $excerpt = !empty($excerpt) ? $excerpt : ' ';

        Galeri::create([
            'deskripsi' => $request->input('deskripsi'),
            'gambar' => $request->file('gambar')->storeAs('thumbnail', $request->file('gambar')->getClientOriginalName()),
            'id_kategori' => $request->input('kategori'),
            'konten' => $konten,
            'excerpt' => $excerpt,
        ]);
        return back();
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
    public function update(Request $request, Galeri $galeri, $id)
    {
        $konten = $request->input('kontenEdit');
        $konten = !empty($konten) ? $konten : ' ';

        $excerpt = $request->input('excerptEdit');
        $excerpt = !empty($excerpt) ? $excerpt : ' ';

        if ($request->hasFile('gambarEdit')) {
            $gambar = $request->file('gambarEdit')->storeAs('thumbnail', $request->file('gambarEdit')->getClientOriginalName());
        } else {
            $gambar = $request->input('gambarEdit');
        }

        $data = [
            'deskripsi' => $request->input('deskripsiEdit'),
            'gambar' => $gambar,
            'id_kategori' => $request->input('kategoriEdit'),
            'konten' => $konten,
            'excerpt' => $excerpt
        ];

        Galeri::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Galeri::destroy($id);
        return back();
    }
}
