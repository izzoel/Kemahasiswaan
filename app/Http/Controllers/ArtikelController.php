<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
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

        Artikel::create([
            'judul' => $request->input('judul'),
            'konten' => $konten,
            'excerpt' => $excerpt,
            'id_kategori' => $request->input('kategori'),
            'thumbnail' => $request->file('thumbnail')->storeAs('thumbnail', $request->file('thumbnail')->getClientOriginalName())
        ]);
        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
        $artikels = Artikel::all();
        $kategoris = Kategori::all();

        return view('admin.main', compact('artikels', 'kategoris'));
    }

    public function showEdit()
    {
        $artikels = Artikel::all();
        return response($artikels);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artikel $artikel, $id)
    {
        $konten = $request->input('kontenEdit');
        $konten = !empty($konten) ? $konten : ' ';

        $excerpt = $request->input('excerptEdit');
        $excerpt = !empty($excerpt) ? $excerpt : ' ';

        if ($request->hasFile('thumbnailEdit')) {
            $thumbnail = $request->file('thumbnailEdit')->storeAs('thumbnail', $request->file('thumbnailEdit')->getClientOriginalName());
        } else {
            $thumbnail = $request->input('thumbnail');
        }

        $data = [
            'judul' => $request->input('judulEdit'),
            'konten' => $konten,
            'excerpt' => $excerpt,
            'kategori' => $request->input('kategoriEdit'),
            'thumbnail' => $thumbnail
        ];

        Artikel::find($id)->update($data);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Artikel::destroy($id);
        return back();
    }
}
