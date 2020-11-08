@extends('partials.template')




@section('title')
    Resultado{{ count($articulos) > 1 ? 's' : '' }} de la busqueda
@endsection


@section('content')

    <div class="row front-page gray-bg">
        <div class=" col-12">
            <h3 class="big-article-title">Resultado{{ count($articulos) > 1 ? 's' : '' }} de la busqueda</h3>
        </div>
        <!-- Blog articles Column -->
        <div class="col-md-8  ">

            @foreach ($articulos as $articulo)
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="big-article">
                        <a href="{{ $articulo->publicUrl() }}">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="image">
                                        @if ($articulo->image)
                                            <img src="{{ asset('storage/' . $articulo->image) }}" alt="titulo de la imagen">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="blog-details">
                                        <h2 class="big-article-title">{{ $articulo->title }}</h2>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>




        <!-- Sidebar Widgets Column -->
        <div class="col-lg-4 m-15px-tb blog-aside">

            @include('partials.ads')
        </div>

    </div>
    @include('partials.pagination')
@endsection
