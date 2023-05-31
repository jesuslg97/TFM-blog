<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<header class="col-md-12">

    <div class="row col-md-12">

        <div class="row col-md-11">
            <div class="col-sm-4 titulo text-center">

                <h1 class="m-0">Modo oscuro</h1>

                <h1 class="m-0">Cambiar idioma</h1>

                <p class="m-0"></p>
            </div>
        </div>

        <div class="row col-md-1">
            <div class="text-center mt-0">
                Redes sociales
            </div>
        </div>

    </div>

    <div class="row">
        <nav class="navbar-expand col-md-10" style="background-color: #F4600C">

            <div class="collapse navbar-collapse">
                <ul class="col-md-10 navbar-nav m-auto text-center text-white">
                    <li class="col-md-2 nav-item">
                        <a class="nav-link text-white" href="{{ route('welcome') }}">Blog</a>
                    </li>
                    <li class="col-md-2 nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Categorías<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="#">Seguridad</a></li>
                            <li class="dropdown-item"><a href="#">Dispositivos/periféricos</a></li>
                            <li class="dropdown-item"><a href="#">Noticias</a></li>
                        </ul>
                    </li>
                    <li class="col-md-2 nav-item">
                        <a class="nav-link text-white" href="#">Últimos post</a>
                    </li>

                    <li class="col-md-2 nav-item">
                        <a class="nav-link text-white" href="{{ route('aboutUs') }}">Quiénes somos</a>
                    </li>
                    <li class="col-md-1 nav-item">
                        <a class="nav-link text-white" href="{{ route('contact') }}">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>

        <nav class="navbar-expand col-md-2" style="background-color: #F4600C">
            <div class="collapse navbar-collapse">
                <ul class="col-md-2 navbar-nav m-auto text-center text-white">
                    <li class="nav-item">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                           @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</header>

</html>
