<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CUPostRequest;

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
    public function store(CUPostRequest $request)
    {   // Retrieve the validated input data...

        $articulo = Post::create($request->validated());
        $this->storeImage($articulo);
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
    public function portada(Post $articulo)
    {

        //$articulos = Post::oldest()->get();
        $articulos = Post::where('posted_at', '<=', date('Y-m-d H:i:s'))->get();
        return view('portada', compact('articulos'));
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
    public function update(CUPostRequest $request, Post $articulo)
    {

        $articulo->update($request->validated());
        $this->storeImage($articulo);
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


    private function storeImage($articulo)
    {
        if (request()->has('image')) {
            $articulo->update([
                'image' => request()->image->store('images/posts', 'public')
            ]);
        }
    }
}