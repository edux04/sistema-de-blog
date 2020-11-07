@extends('partials.template')

@section('title', $articulo->title)


@section('content')
    <h1>{{ $articulo->title }} <a class='btn btn-primary' href="{{ $articulo->url() }}/editar">Editar</a>
    </h1>
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
