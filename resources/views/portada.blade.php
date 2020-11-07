@extends('partials.template')

@section('title', 'Portada')



@section('content')
    <h1>Articulos ({{ count($articulos) }})</h1>



    @forelse ($articulos as $articulo)
        <li class="d-flex p-2 justify-content-around">


            <a href="{{ $articulo->url() }}">{{ $articulo->title }}</a>



            <span class="text-danger">Categoria ({{ $articulo->category->name }})</span>
            <div class="d-flex">
                <a class='btn btn-primary mr-5' href="{{ $articulo->url() }}/editar">Editar</a>
                <form action="{{ $articulo->url() }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class='btn btn-danger'>Eliminar</button>
                </form>
            </div>
        </li>
    @empty

    @endforelse



@endsection
