<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        // $post = $request->all();
        // dd($post);
        // dd($request->file('thumnail')->storeAs('thumnail', $request->file('thumnail')->getClientOriginalName()));
        // Post::create($post);
        Post::create([
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
            'excerpt' => $request->input('excerpt'),
            'kategori' => $request->input('kategori'),
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
    public function update(Request $request, Post $post)
    {
        //
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
