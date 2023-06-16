@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12">
                <div class="col-12 text-center mt-3">
                    @if($category->category_id == 4)
                        <h1>Posts sobre Seguridad</h1>
                    @elseif($category->category_id == 2)
                        <h1>Posts sobre Dispositivos/periféricos</h1>
                    @elseif($category->category_id == 3)
                        <h1>Posts sobre Noticias</h1>
                    @endif
                    <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
                </div>

                <div class="m-1 text-center">
                    <p>En esta página podemos encontrar varios posts relacionados con el tema de la seguridad
                        en los dispositivos tecnológicos, ya sea para describir consejos, realizar cambios...</p>
                </div>

                <div class="col-12 d-flex align-items-center justify-content-center">
                    @if($category->category_id == 4)
                        @foreach($categoriesLang as $categoryLang)
                            @if($categoryLang->id == 1 || $categoryLang->id == 2 || $categoryLang->id == 3)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @if($post->category_id == 4)
                                                <img src="{{ asset($post->image_path) }}" alt="imagen categoría seguridad">
                                            @endif
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            <a class="btn text-white" style="background-color: #F4600C"
                                               href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre seguridad</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @elseif($category->category_id == 2)
                        @foreach($categoriesLang as $categoryLang)
                            @if($categoryLang->id == 4 || $categoryLang->id == 5 || $categoryLang->id == 6)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @if($post->category_id == 4)
                                                <img src="{{ asset($post->image_path) }}" alt="imagen categoría dispositivo/periferico">
                                            @endif
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            <a class="btn text-white" style="background-color: #F4600C"
                                               href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre dispositivos</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    @elseif($category->category_id == 3)
                        @foreach($categoriesLang as $categoryLang)
                            @if($categoryLang->id == 7 || $categoryLang->id == 8 || $categoryLang->id == 9)
                                <div class="col-4">
                                    <div class="card mb-2">
                                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @if($post->category_id == 4)
                                                <img src="{{ asset($post->image_path) }}" alt="imagen categoría noticias">
                                            @endif
                                            <p class="card-text">Para más información clique en el siguiente botón.</p>
                                            <a class="btn text-white" style="background-color: #F4600C"
                                               href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre Internet</a>
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
