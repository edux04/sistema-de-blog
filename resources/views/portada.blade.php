@extends('partials.template')

@section('title', 'Portada')



@section('content')
<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
       @foreach ($categorias as $categoria)
       <a class="p-2 text-muted" href="/{{$categoria->name}}">{{$categoria->name}}</a>
       @endforeach



    </nav>
  </div>
    <section class="row bg-primary p-5">

        @forelse ($articulos as $articulo)


            <a href='{{ $articulo->publicUrl() }}' class="front-card col-sm mx-2">

                @if ($articulo->image)

                <img src="{{ asset('storage/' . $articulo->image) }}" alt="titulo de la imagen">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $articulo->title }} </h5>
                    <p class="text-muted">{{ $articulo->category->name }}.</p>

                </div>
            </a>



        @empty

        @endforelse
    </section>



@endsection
