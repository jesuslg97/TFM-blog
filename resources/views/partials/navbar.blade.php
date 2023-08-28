<div class="row col-12 mt-1 mb-1">

    <div class="col-3">
            <span><strong>Vista en modo: </strong>
                <button type="button" class="btn btn-sm btn-warning mb-1"><i class="bi bi-sun"></i></button>
                <button type="button" class="btn btn-sm btn-dark mb-1"><i class="bi bi-moon"></i></button>
            </span><br>
        <span><strong>Idioma: </strong>
                <button type="button" class="btn btn-sm btn-danger">ESP <i class="bi bi-flag"></i></button>
                <button type="button" class="btn btn-sm btn-primary">ING <i class="bi bi-flag"></i></button>
            </span>
    </div>

    <div class="row col-6 text-center">
        <div class="col mt-3">
            <hr class="teal accent-3 d-inline-block" style="width: 100%; border: 2px solid #F4600C">
        </div>

        <div class="col">
            <img src="{{ asset('storage/images/Logo_VIU.PNG') }}"
                 alt="IMAGEN LOGO VIU" class="w-100">
        </div>

        <div class="col mt-3">
            <hr class="teal accent-3 d-inline-block" style="width: 100%; border: 2px solid #F4600C">
        </div>
    </div>

    <div class="col-3 text-right">
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
                                <li class="dropdown-item"><a href="{{ route('categories.index') }}">Imagen de Categorías</a></li>
                                <li class="dropdown-item"><a href="{{ route('categoriesLang.index') }}">Categorías multiidioma</a></li>
                            </ul>
                        </li>
                        <li class="col-md-4 nav-item">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Posts<span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item"><a href="{{ route('posts.index') }}">Imagen de Posts</a></li>
                                <li class="dropdown-item"><a href="{{ route('postsLang.index') }}">Posts multiidioma</a></li>
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
                                    <a href="http://localhost:8888/categories/1/show">Seguridad</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="http://localhost:8888/categories/2/show">Dispositivos/periféricos</a>
                                </li>
                                <li class="dropdown-item">
                                    <a href="http://localhost:8888/categories/3/show">Noticias</a>
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
