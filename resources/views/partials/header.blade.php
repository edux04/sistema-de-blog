<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" ”" type=”image/png” href="{{ URL::to('/') }}/images/diariopng.png" />
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<header class="container mt-3">
    @include('partials.nav')
</header>

<body>



    <section class="container content">

        @if (Session::has('successMessage'))
            <div class="alert alert-success" role="alert">{{ Session::get('successMessage') }}</div>
        @endif
