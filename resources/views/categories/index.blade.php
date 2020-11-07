@extends('partials.template')

@section('title',"Listado de categorias")


@section('content')
<h1>Categorias ({{count($categorias)}})</h1>
<ul>
@forelse ($categorias as $categoria)
<li class='h3'> {{ $loop->index }} <a href="/categorias/{{$categoria->name}}">-{{$categoria->name}}</a> <a class='btn btn-primary'
href="/categorias/{{$categoria->name}}/editar">Editar</a></li>
@empty
</ul>
@endforelse
@endsection
