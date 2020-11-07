@extends('partials.template')

@section('title', 'Nueva categoria')


@section('content')
    <h1>Nuevo categoria</h1>
    <form action="/categorias/" method="post">
        @include('categories.form')
        <button class="btn btn-success" type="submit">Crear</button>
    </form>


@endsection
