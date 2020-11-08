<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/"><img src="{{ URL::to('/') }}/images/diariopng.png" alt="logo" class="logo"> Diario
        Siempre</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Articulos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/articulos/">Listado de articulos</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/articulos/crear/">Nuevo articulo</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Categorias
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/categorias/">Listado de categorias</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/categorias/crear/">Nueva categoria</a>
                </div>
            </li>

        </ul>
        <form class="form-inline my-2 my-lg-0" method="GET" action="/busqueda/">

            <input class="form-control mr-sm-2" type="search" placeholder="Realiza una busqueda" aria-label="Search"
                name="search" value="{{ isset($_GET['search']) ? $_GET['search'] : '' }}">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>
