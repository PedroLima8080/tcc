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
                <a class="h4 route" href="home">HOME </a>
            </li>
            <li class="nav-item {{ Request::path() === 'livros' ? 'route-active' : '' }}">
                <a class="h4 route" href="livros">LIVROS</a>
            </li>
            <li class="nav-item {{ Request::path() === 'favoritos' ? 'route-active' : '' }}">
                <a class="h4 route" href="favoritos">FAVORITOS</a>
            </li>
            @if (!Auth::guard('user')->check() && !Auth::guard('library')->check())
                <li
                    class="nav-item {{ Request::path() === 'login' ? 'route-active' : (Request::path() === 'register' ? 'route-active' : '') }}">
                    <a class="h4 route" href="#">CADASTRO</a>
                </li>
            @endif
            @if (Auth::guard('user')->check() || Auth::guard('library')->check())
                <div class="dropdown">
                    <div class="btn-group">
                        <button type="button" class="btn dropdown-toggle d-flex align-items-center "
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle icon-header"></i>&nbsp;
                            @if (Auth::guard('user')->check())
                                {{ Auth::guard('user')->user()->nome }}
                            @elseif(Auth::guard('library')->check())
                                {{ Auth::guard('library')->user()->nome }}
                            @endif
                            &nbsp;
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('profile') }}">Perfil</a>
                            @if (Auth::guard('user')->check() && Auth::guard('user')->user()->adm == 1)
                                <a href="{{ route('libs') }}" class="dropdown-item">Ver Bibliotecas</a>
                            @endif
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </ul>
    </div>
</nav>
