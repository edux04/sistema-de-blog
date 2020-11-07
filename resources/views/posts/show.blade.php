@extends('partials.template')

@section('title',$post->title)


@section('content')
<h1>{{$post->title}} <a class='btn btn-primary' href="/articulos/{{$post->id}}/editar">Editar</a> </h1>
<form action="/articulos/{{$post->id}}" method="POST">
    @method('DELETE')
    @csrf
<button class='btn btn-danger' >Eliminar</button>
</form>
<span class="text-danger">({{$post->category->name}})</span>
<section>
    {{$post->body}}
</section>
@endsection
