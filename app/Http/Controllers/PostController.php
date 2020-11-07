<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Post::all();
        return view('posts.index', compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Category::all();
        return view('posts.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required|max:10000',
            'category_id' => 'required|int'
        ]);

        Post::create($data);
        return redirect('articulos')->with('successMessage', '¡Articulo creado satisfactoriamente!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $articulo)
    {

        return view('posts.show', compact('articulo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $articulo)
    {
        $categorias = Category::all();
        return view('posts.edit', compact('categorias', 'articulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Post $articulo)
    {
        $data = request()->validate([
            'title' => 'required',
            'body' => 'required|max:10000',
            'category_id' => 'required|int'
        ]);

        $articulo->update($data);
        return redirect($articulo->url())->with('successMessage', '¡Articulo actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $articulo)
    {
        $articulo->delete();
        return redirect('articulos/')->with('successMessage', '¡Articulo eliminado satisfactoriamente!');
    }

    public function list($category, Post $articulo)
    {
        return view('posts.post', compact('articulo'));
    }
}