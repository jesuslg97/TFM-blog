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

    <div class="row col-12 mt-1 mb-1">

        <div class="col-4 text-center">
            <span><strong>Vista en modo: </strong>
                <button type="button" class="btn btn-sm btn-warning mb-1"><i class="bi bi-sun"></i></button>
                <button type="button" class="btn btn-sm btn-dark mb-1"><i class="bi bi-moon"></i></button>
            </span><br>
            <span><strong>Idioma: </strong>
                <button type="button" class="btn btn-sm btn-danger">ESP <i class="bi bi-flag"></i></button>
                <button type="button" class="btn btn-sm btn-primary">ING <i class="bi bi-flag"></i></button>
            </span>
        </div>

        <div class="row col-4 text-center">
            <div class="col">
                <hr class="teal accent-3 d-inline-block" style="width: 120%; border: 2px solid #F4600C">
            </div>

            <div class="col">
                <img src="/public/images/Logo_VIU.PNG" alt="IMAGEN LOGO VIU">
            </div>

            <div class="col">
                <hr class="teal accent-3 d-inline-block" style="width: 120%; border: 2px solid #F4600C">
            </div>
        </div>

        <div class="col-2 text-center offset-2">
            <span><i class="bi bi-instagram fs-2 m-1" style="font-size: xx-large; color: hotpink"></i></span>
            <span><i class="bi bi-facebook fs-2 m-1" style="font-size: xx-large; color: blue"></i></span>
            <span><i class="bi bi-twitter fs-2 m-1" style="font-size: xx-large; color: lightskyblue"></i></span>
        </div>

    </div>

    <div class="row">
        <div class="row col-10">
            <nav class="navbar-expand col-10" style="background-color: #F4600C">

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav text-center">

                        @if(Auth::id() == 1)
                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('welcome') }}">Blog</a>
                            </li>
                            <li class="col-md-4 nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categorías<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
                                    <li class="dropdown-item"><a href="{{ route('categoriesLang.index') }}">Idiomas de Categorías</a></li>
                                </ul>
                            </li>
                            <li class="col-md-4 nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Posts<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item"><a href="{{ route('posts.index') }}">Posts</a></li>
                                    <li class="dropdown-item"><a href="{{ route('postsLang.index') }}">Idiomas de Posts</a></li>
                                </ul>
                            </li>

                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('languages.index') }}">Idiomas</a>
                            </li>
                        @else
                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('welcome') }}">Blog</a>
                            </li>
                            <li class="col-md-3 nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Categorías<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item">
                                        @foreach($categoriesLang as $categoryLang)
                                            @if($categoryLang->id == 4)
                                                <a href="{{ route('categoriesLang.show', $categoryLang->id) }}">Seguridad</a>
                                            @endif
                                        @endforeach
                                    </li>
                                    <li class="dropdown-item">
                                        @foreach($categoriesLang as $categoryLang)
                                            @if($categoryLang->id == 2)
                                                <a href="{{ route('categoriesLang.show', $categoryLang->id) }}">Dispositivos/periféricos</a>
                                            @endif
                                        @endforeach
                                    </li>
                                    <li class="dropdown-item">
                                        @foreach($categoriesLang as $categoryLang)
                                            @if($categoryLang->id == 3)
                                                <a href="{{ route('categoriesLang.show', $categoryLang->id) }}">Noticias</a>
                                            @endif
                                        @endforeach
                                    </li>
                                </ul>
                            </li>
                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('last_post') }}">Últimos post</a>
                            </li>

                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('aboutUs') }}">Quiénes somos</a>
                            </li>
                            <li class="col-md-3 nav-item">
                                <a class="nav-link text-white" href="{{ route('contact') }}">Contacto</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
            <nav class="navbar-expand col-12" style="background-color: #F4600C">
                <div class="col-12 collapse navbar-collapse">
                    <ul class="col-12 navbar-nav text-center">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}"><i class="bi bi-person-check"></i> {{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}"><i class="bi bi-person-add"></i> {{ __('Register') }}</a>
                                </li>
                           @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-check"></i> Usuario: {{ Auth::user()->name }} <span class="caret"></span>
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
                    </ul>
                </div>
            </nav>
        </div>

    </div>

</header>

</html>
