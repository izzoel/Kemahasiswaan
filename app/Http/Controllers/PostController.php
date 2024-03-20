<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $excerpt = $request->input('excerpt');
        $excerpt = !empty($excerpt) ? $excerpt : ' ';

        Post::create([
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
            'excerpt' => $excerpt,
            'id_kategori' => $request->input('kategori'),
            'thumbnail' => $request->file('thumbnail')->storeAs('thumbnail', $request->file('thumbnail')->getClientOriginalName())
        ]);
        return redirect(route('main'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $posts = Post::all();
        return response($posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, $id)
    {
        if ($request->hasFile('thumbnailEdit')) {
            $thumbnail = $request->file('thumbnailEdit')->storeAs('thumbnail', $request->file('thumbnailEdit')->getClientOriginalName());
        } else {
            $thumbnail = $request->input('thumbnail');
        }

        $data = [
            'judul' => $request->input('judulEdit'),
            'konten' => $request->input('kontenEdit'),
            'excerpt' => $request->input('excerptEdit'),
            'kategori' => $request->input('kategoriEdit'),
            'thumbnail' => $thumbnail
        ];

        Post::find($id)->update($data);

        return redirect(route('main'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return back();
    }
}
