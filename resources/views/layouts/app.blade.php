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
                        Blog
                    </li>
                    <li class="col-md-2 nav-item">
                        Categorías
                    </li>
                    <li class="col-md-2 nav-item">
                        Últimos post
                    </li>

                    <li class="col-md-2 nav-item">
                        Quiénes somos
                    </li>
                    <li class="col-md-1 nav-item">
                        Contacto
                    </li>
                </ul>
            </div>
        </nav>

        <nav class="navbar-expand col-md-2" style="background-color: #F4600C">
            <div class="collapse navbar-collapse">
                <ul class="col-md-2 navbar-nav m-auto text-center text-white">
                    <li class="nav-item">
                        Cuenta
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</header>

</html>
