@extends('partials.template')

@section('title', $articulo->title)


@section('content')
    <h1>{{ $articulo->title }} </h1>
    @if ($articulo->image)
        <img src="{{ asset('storage/' . $articulo->image) }}" alt="titulo de la imagen" class="img-fluid">
    @endif
    <a class='btn btn-primary' href="{{ $articulo->url() }}/editar">Editar</a>

    <form action="{{ $articulo->url() }}" method="POST">
        @method('DELETE')
        @csrf
        <button class='btn btn-danger'>Eliminar</button>
    </form>
    <span class="text-danger">({{ $articulo->category->name }})</span>
    <section>
        {{ $articulo->body }}
    </section>
@endsection
