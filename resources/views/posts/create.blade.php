@extends('partials.template')

@section('title', 'Nuevo post')


@section('content')
<div class="front-page bg-white">
    <h1>Nuevo articulo</h1>
    <form action="/articulos/" method="post" enctype="multipart/form-data">
        @include('posts.form')
        <button class="btn btn-success" type="submit">Crear</button>
    </form>

</div>
@endsection

@section('scripts')
    <!-- Scripts -->
    <script src="{{ asset('js/functions.js') }}" defer></script>
@endsection
