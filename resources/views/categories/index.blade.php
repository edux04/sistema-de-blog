@extends('partials.template')

@section('title', 'Listado de categorias')


@section('content')

    <div class="front-page gray-bg">
        <h1>Categorias ({{ count($categorias) }})</h1>



        @forelse ($categorias as $categoria)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="/categorias/{{ $categoria->name }}">{{ $categoria->name }}</a>
                    <div class="d-flex">
                        <a class='btn btn-primary mr-5' href="/categorias/{{ $categoria->name }}/editar">Editar</a>
                        <form action="/categorias/{{ $categoria->name }}/" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class='btn btn-danger'>Eliminar</button>
                        </form>
                    </div>

                </li>

            </ul>
        @empty
            <p>No hay articulos</p>
        @endforelse

        <div class="d-flex justify-content-center">
            {{ $categorias->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection
