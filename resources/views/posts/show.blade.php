@extends('partials.template')

@section('title', $articulo->title)


@section('content')
    <div class="blog-single gray-bg">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-title">
                            <h6><a href="/{{ $articulo->category->name }}">{{ $articulo->category->name }}</a></h6>
                            <div class="d-flex">
                                <a class='btn btn-primary mr-5' href="{{ $articulo->url() }}/editar">Editar</a>
                                <form action="{{ $articulo->url() }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class='btn btn-danger'>Eliminar</button>
                                </form>
                            </div>
                            <h2>{{ $articulo->title }}</h2>

                        </div>
                        <div class="article-img">
                            @if ($articulo->image)
                                <img src="{{ asset('storage/' . $articulo->image) }}" alt=" {{ $articulo->title }}"
                                    class="details-img">
                            @endif
                        </div>

                        <div class="article-content">
                            <p>{{ $articulo->body }}
                            </p>

                        </div>

                    </article>

                </div>
                <div class="col-lg-4 m-15px-tb blog-aside">

                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Articulos recientes</h3>
                        </div>
                        <div class="widget-body">
                            @forelse ($latestsArticles as $latestsArticle)
                                <a class="latest-post-aside media" href="{{ $latestsArticle->publicUrl() }}">
                                    <div class="lpa-left media-body">
                                        <div class="lpa-title">
                                            <h5>{{ $latestsArticle->title }}</h5>
                                        </div>
                                        <div class="lpa-meta">

                                            <p class="date">
                                                {{ $latestsArticle->posted_at }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="lpa-right">

                                        @if ($articulo->image)
                                            <img src="{{ asset('storage/' . $latestsArticle->image) }}"
                                                alt=" {{ $latestsArticle->title }}" class="details-img">
                                        @endif

                                    </div>
                                </a>
                            @empty
                                <p>No hay articulos para mostrar </p>
                            @endforelse

                        </div>
                        <!-- End Latest Post -->
                        <!-- widget Tags -->
                        <div class="widget widget-tags">
                            <div class="widget-title">
                                <h3>Temas recientes</h3>
                            </div>
                            <div class="widget-body">
                                <div class="nav tag-cloud">


                                    @forelse ($lastestCategories as $lastestCategory)

                                        <a href="/{{ $lastestCategory->name }}">{{ ucfirst($lastestCategory->name) }}</a>
                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- End widget Tags -->
                        @include('partials.ads')
                    </div>
                </div>
            </div>
        </div>
    @endsection
