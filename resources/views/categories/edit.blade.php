@extends('partials.template')

@section('title', 'Editar categoria')


@section('content')
<div class="front-page bg-white">
    <h1>Editando categoria</h1>

    <form action="/categorias/{{ $categoria->name }}" method="post">
        @method('PATCH')
        @include('categories.form')
        <button class="btn btn-success" type="submit">Guardar</button>
    </form>
</div>

@endsection
