@extends('partials.template')

@section('title',"Editar categoria")


@section('content')
<h1>Editar categoria</h1>

<form action="/categorias/{{$category->id}}" method="post" >
    @method('PATCH')
    @include('categories.form')
    <button class="btn btn-success" type="submit">Guardar</button>
</form>


@endsection
