@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12">
                <div class="col-12 text-center mt-3">
                    <h1>Posts sobre {{ $category->name }}</h1>
                    <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
                </div>

                <div class="m-1 text-center">
                    <p>En esta página podemos encontrar varios posts relacionados con el tema de {{ $category->name }}
                        en los dispositivos tecnológicos, ya sea para describir consejos, realizar cambios...</p>
                </div>

                <div class="ml-3">
                    <p>
                        Para crear un nuevo post pulse en el siguiente botón:
                        <a class="btn btn-dark text-white" href="{{ route('postsLang.create') }}">Crear Post</a>
                    </p>
                </div>


                    <div class="row col-12 d-flex align-items-center justify-content-center">
                        @foreach($category->posts as $post)
                            <div class="col-4">
                                <div class="card mb-2">
                                    <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                        <h5 class="card-title"><strong>{{ $post->postLangs()->first()->title }}</strong></h5>
                                        <img src="{{ asset('storage/images/posts/' . $post->image_path) }}"
                                             alt="imagen categoría seguridad" class="w-75">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C"
                                           href="{{ route('postsLang.show', $post->id) }}">Más información</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

            </div>

        </div>
    </div>
@endsection
