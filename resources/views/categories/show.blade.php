@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12">
                <div class="col-12 text-center mt-3">
                    @if($category->id == 1)
                        <h1>Posts sobre Seguridad</h1>
                    @elseif($category->id == 2)
                        <h1>Posts sobre Dispositivos/periféricos</h1>
                    @elseif($category->id == 3)
                        <h1>Posts sobre Noticias</h1>
                    @endif
                    <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
                </div>

                <div class="m-1 text-center">
                    <p>En esta página podemos encontrar varios posts relacionados con el tema de la seguridad
                        en los dispositivos tecnológicos, ya sea para describir consejos, realizar cambios...</p>
                </div>

                <div class="col-12 d-flex align-items-center justify-content-center">
                    @if($category->id == 1)
                        @foreach($posts as $post)
                            @if($post->category_id == 1)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{ asset('storage/images/posts/' . $post->image_path) }}"
                                                 alt="imagen categoría seguridad" class="w-75">
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            @if($post->id == 1 || $post->id == 2 || $post->id == 3)
                                                <a class="btn text-white" style="background-color: #F4600C"
                                                   href="{{ route('postsLang.show', $post->id) }}">Posts sobre seguridad</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @elseif($category->id == 2)
                        @foreach($posts as $post)
                            @if($post->category_id == 2)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{ asset('storage/images/posts/' . $post->image_path) }}"
                                                 alt="imagen categoría seguridad" class="w-75">
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            @if($post->id == 4 || $post->id == 5 || $post->id == 6)
                                                <a class="btn text-white" style="background-color: #F4600C"
                                                   href="{{ route('postsLang.show', $post->id) }}">Posts sobre dispositivos/periféricos</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @elseif($category->id == 3)
                        @foreach($posts as $post)
                            @if($post->category_id == 3)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{ asset('storage/images/posts/' . $post->image_path) }}"
                                                 alt="imagen categoría seguridad" class="w-75">
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            @if($post->id == 7 || $post->id == 8 || $post->id == 9)
                                                <a class="btn text-white" style="background-color: #F4600C"
                                                   href="{{ route('postsLang.show', $post->id) }}">Posts sobre noticias</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
