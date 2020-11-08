<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CUPostRequest;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = Post::paginate(5);
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
        return redirect('articulos')->with('successMessage', '¡Articulo creado satisfactoriamente!');
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
        $categorias = Category::all();
        $articulos = Post::where('posted_at', '<=', date('Y-m-d H:i:s'))->paginate(5);
        return view('portada', compact('categorias', 'articulos'));
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
        unlink(public_path('storage/' . $articulo->image));

        return redirect('articulos/')->with('successMessage', '¡Articulo eliminado satisfactoriamente!');
    }

    public function list($categoria, Post $articulo)
    {
        if (Str::lower($categoria) != Str::lower($articulo->category->name)) {
            return redirect($articulo->publicUrl());
        }
        if ($articulo->posted_at > date('Y-m-d H:i:s')) {
            abort(404);
        }

        $latestsArticles = Post::latest()->get();
        $lastestCategories = Category::latest()->get();
        return view('posts.post', compact('lastestCategories', 'latestsArticles', 'articulo'));
    }


    public function search(Request $request)
    {

        $search =  $request['search'];
        if ($search != "") {
            $articulos = Post::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            })->where('posted_at', '<=', date('Y-m-d H:i:s'))->paginate(5);
        } else {
            $articulos = Post::where('posted_at', '<=', date('Y-m-d H:i:s'))->paginate(5);
        }
        return View('posts.search', compact('articulos', 'search'));
    }


    private function storeImage($articulo)
    {
        if (request()->has('image')) {
            $articulo->update([
                'image' => request()->image->store('images/posts', 'public')
            ]);
            $image = Image::make(public_path('storage/' . $articulo->image))->fit(600, 400);
            $image->save();
        }
    }
}