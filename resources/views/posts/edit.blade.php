@extends('partials.template')

@section('title',"Nuevo post")


@section('content')
<h1>Editar articulo</h1>
<form action="/articulos/{{$post->id}}" method="post" >
    @method('PATCH')
    @include('posts.form')
    <button class="btn btn-success" type="submit">Guardar</button>
</form>


@endsection
