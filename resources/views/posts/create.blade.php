@extends('partials.template')

@section('title',"Nuevo post")


@section('content')
<h1>Nuevo articulo</h1>
<form action="/articulos/" method="post">
    @include('posts.form')
    <button class="btn btn-success" type="submit">Crear</button>
</form>


@endsection
