@extends('partials.template')

@section('title', 'Portada')



@section('content')

    <section class="row bg-primary p-5">

        @forelse ($articulos as $articulo)


            <a href='{{ $articulo->url() }}' class="front-card  mx-2">

                @if ($articulo->image)
                    <div class="card-image" style="background-image:url({{ asset('storage/' . $articulo->image) }});">

                    </div>

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
