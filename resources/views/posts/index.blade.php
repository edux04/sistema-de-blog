@extends('partials.template')

@section('title',"Listado de posts")


@section('content')
<h1>Articulos ({{count($posts)}})</h1>
<ul>
@forelse ($posts as $post)
<li class='h3'> {{ $loop->index }} <a href="/articulos/{{$post->id}}">-{{$post->title}} <span class="text-danger">({{$post->category->name}})</span></a> <a class='btn btn-primary' href="/articulos/{{$post->id}}/editar">Editar</a></li>
@empty
</ul>
@endforelse
@endsection
