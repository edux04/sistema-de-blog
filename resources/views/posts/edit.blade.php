@extends('partials.template')

@section('title', 'Nuevo post')


@section('content')
    <div class="front-page bg-white">
        <h1>Editando articulo</h1>
        <form action="{{ $articulo->url() }}" method="post" enctype="multipart/form-data">
            @method('PATCH')
            @include('posts.form')
            <button class="btn btn-success" type="submit">Guardar</button>
        </form>

    </div>

@endsection
@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/functions.js') }}" defer></script>
@endsection
