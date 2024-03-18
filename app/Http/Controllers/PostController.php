<?php

namespace App\Http\Controllers;

use App\Models\Post;
<<<<<<< HEAD
=======
use App\Models\Kategori;
>>>>>>> 740fe1f (add fitur tambah kategori)
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
<<<<<<< HEAD
        // $post = $request->all();
        // dd($post);
        // dd($request->file('thumnail')->storeAs('thumnail', $request->file('thumnail')->getClientOriginalName()));
        // Post::create($post);
=======
>>>>>>> 740fe1f (add fitur tambah kategori)
        Post::create([
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
            'excerpt' => $request->input('excerpt'),
<<<<<<< HEAD
            'kategori' => $request->input('kategori'),
=======
            'id_kategori' => $request->input('kategori'),
>>>>>>> 740fe1f (add fitur tambah kategori)
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
<<<<<<< HEAD

            $thumbnail = $request->input('thumbnailEditx');
=======
            $thumbnail = $request->input('thumbnail');
>>>>>>> 740fe1f (add fitur tambah kategori)
        }

        $data = [
            'judul' => $request->input('judulEdit'),
            'konten' => $request->input('kontenEdit'),
            'excerpt' => $request->input('excerptEdit'),
            'kategori' => $request->input('kategoriEdit'),
<<<<<<< HEAD
        ];


        // Post::find($id)->update($data);
        // $post->update($request->all());
        // dd($request->all());

        dd($request->file('thumbnailEdit'));
=======
            'thumbnail' => $thumbnail
        ];

        Post::find($id)->update($data);

>>>>>>> 740fe1f (add fitur tambah kategori)
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
