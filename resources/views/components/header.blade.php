<nav class="navbar navbar-light bg-light navbar-expand-lg">
    <div class="content-logo">
        <img src="{{ asset('img/logo_horizontal.png') }}" alt="" class="logo-header">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
        aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav w-100 d-flex justify-content-around align-items-center">
            
            <li class="nav-item {{ Request::path() === 'home' ? 'route-active' : '' }}">
                <a class="h5" href="#">HOME </a>
            </li>
            <li class="nav-item {{ Request::path() === 'login' ? 'route-active' : (Request::path() === 'register' ? 'route-active' : '') }}">
                <a class="h5" href="#">CADASTRO</a>
            </li>
            <li class="nav-item" {{ Request::path() === 'livros' ? 'route-active' : '' }}>
                <a class="h5" href="#">LIVROS</a>
            </li>
        </ul>
    </div>
</nav>
