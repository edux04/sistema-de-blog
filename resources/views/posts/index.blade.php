@extends('partials.template')

@section('title', 'Listado de posts')


@section('content')
    <div class="front-page gray-bg">
        <h1>Articulos ({{ count($articulos) }})</h1>



        @forelse ($articulos as $articulo)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ $articulo->url() }}">{{ $articulo->title }}</a>
                    <div class="d-flex">
                        <a class='btn btn-primary mr-5' href="{{ $articulo->url() }}/editar">Editar</a>
                        <form action="{{ $articulo->url() }}" method="POST">
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


    </div>

    @include('partials.pagination')
@endsection
