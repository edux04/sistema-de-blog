@extends('partials.template')

@section('title', 'Listado de categorias')


@section('content')
    <h1>Categorias ({{ count($categorias) }})</h1>
    <ul>
        @forelse ($categorias as $categoria)
            <li class='h3'> <a href="/categorias/{{ $categoria->name }}">{{ $categoria->name }}</a> <a class='btn btn-primary'
                    href="/categorias/{{ $categoria->name }}/editar">Editar</a></li>
        @empty

        @endforelse
    </ul>
    <div class="d-flex justify-content-center">
        {{ $categorias->links('pagination::bootstrap-4') }}
    </div>
@endsection
