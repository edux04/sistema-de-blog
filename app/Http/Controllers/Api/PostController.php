<?php

namespace App\Http\Controllers\Api;


use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Post as PostResource;

class PostController extends Controller
{
    public function index()
    {

        return PostResource::collection(Post::all());
    }

    public function show(Post $articulo)
    {
        return new PostResource($articulo);
    }
}