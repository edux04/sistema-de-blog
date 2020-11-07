@extends('partials.template')

@section('title',"Listado de categorias")


@section('content')
<h1>Categorias ({{count($categories)}})</h1>
<ul>
@forelse ($categories as $category)
<li class='h3'> {{ $loop->index }} <a href="/categorias/{{$category->id}}">-{{$category->name}}</a> <a class='btn btn-primary'
href="/categorias/{{$category->id}}/editar">Editar</a></li>
@empty
</ul>
@endforelse
@endsection
