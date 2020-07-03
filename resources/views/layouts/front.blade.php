<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fatec Jaú Helpdesk</title>
    <link rel="stylesheet" href="{{ asset('assets/css/helpdeskBulma.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/icons.css')}}">
</head>
<body id="app">
    {{-- @dd(auth()->user()->roles) --}}
<header>
    <nav class="navbar is-dark">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{route('home')}}">
                <span class="tag is-black is-size-7 has-text-weight-bold">
                    <span class="has-text-danger">Fatec</span>&nbsp
                    Helpdesk
                </span>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                @if(auth()->check() && auth()->user()->hasRole('Admin'))
                    @auth
                    <a class="navbar-item @if(request()->is('admin/users*')) active @endif "
                        href="{{route('admin.users.index')}}">
                        Usuários
                    </a>
                    <a class="navbar-item @if(request()->is('admin/devices*')) active @endif"
                        href="{{route('admin.devices.index')}}">
                        Equipamentos
                    </a>
                    <a class="navbar-item @if(request()->is('admin/places*')) active @endif"
                        href="{{route('admin.places.index')}}">
                        Laboratórios
                    </a>
                    <a class="navbar-item @if(request()->is('admin/occurrencestype*')) active @endif"
                        href="{{route('admin.occurrencestype.index')}}">
                        Tipo Ocorrência
                    </a>
                    <a class="navbar-item @if(request()->is('admin/occurrences*')) active @endif"
                        href="{{route('admin.occurrences.index')}}">
                        Ocorrências
                    </a>
                    {{-- <ul class="navbar-nav mr-auto">
                        <li class="navbar-item @if(request()->is('admin/stores*')) active @endif">
                            <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="navbar-item @if(request()->is('admin/products*')) active @endif">
                            <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                        </li>
                        <li class="navbar-item @if(request()->is('admin/categories*')) active @endif">
                            <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                        </li>
                    </ul> --}}
                    @endauth
                @endif

                @if (auth()->check() && auth()->user()->hasRole('User'))
                    @auth
                        <a class="navbar-item @if(request()->is('user/occurrence*'))
                            active @endif" href="{{route('user.occurrence.index')}}">
                            Ocorrências
                        </a>
                    @endauth
                @endif
            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <span class="nav-link">{{auth()->user()->name}}</span>
                </div>
                <a class="navbar-item has-text-weight-bold has-text-warning" href="#"
                    onclick="event.preventDefault();
                    document.querySelector('form.logout').submit(); ">
                    Sair
                </a>
                <form action="{{route('logout')}}" class="logout is-hidden" method="POST">
                    @csrf
                </form>
            </div>
        </div>
    </nav>
</header>
<main id="app-content" class="has-background-light">
    @include('sweetalert::alert')
    @yield('content')
</main>
<footer class="footer has-background-dark is-paddingless">
    <div class="content">
        <div class="columns is-marginless">
            <div class="column">
                <p class="title is-7 has-text-white">FATEC © 2020</p>
            </div>
            <div class="column">
                <p class="has-text-centered has-text-dark">
                    <a class="has-text-dark" href="https://github.com/deivid-afonso" target="_blank">
                        By D3ivid
                    </a>
                    <a class="has-text-dark" href="https://github.com/jvitorfrancisco" target="_blank">
                        & JvitorFr4ancisco
                    </a>
                </p>
            </div>
            <div class="column">
                <p class="has-text-white-bis title is-7 has-text-right">
                    Made by <span class="has-text-danger">Students</span> with
                    <span style="fill: red; margin-top:2px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"><path d="M12 4.419c-2.826-5.695-11.999-4.064-11.999 3.27 0 7.27 9.903 10.938 11.999 15.311 2.096-4.373 12-8.041 12-15.311 0-7.327-9.17-8.972-12-3.27z"/></svg>
                    </span>
                </p>
            </div>
        </div>
    </div>
</footer>
@yield('post-script')
</body>
</html>
