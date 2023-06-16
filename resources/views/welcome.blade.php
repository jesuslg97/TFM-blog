@extends('layouts.main')

@section('title')
    {{__('string.home_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3">
                <h1>¡Bienvenido a nuestro Blog sobre tecnología!</h1>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
            </div>

            <div class="mx-auto">
                <p>En nuestro Blog encontrarás todo lo necesario sobre lo último en seguridad, nuevos dispostivos y/o periféricos
                    de última generación, noticias, etc.</p>
            </div>

            <div class="col-12 d-flex align-items-center justify-content-center">
                @foreach($categoryLangs as $categoryLang)
{{--                    @foreach($postsLang as $postLang)--}}
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                    @if($categoryLang->lang_id == 1)
                                        @if($categoryLang->id == 1)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @foreach($categories as $category)
                                                <img src="{{ asset($category->image_path) }}" alt="imagen categoría seguridad">
                                            @endforeach
                                            <p class="card-text">Listado de los posts relacionados con la seguridad.</p>
{{--                                            @if($postLang->id == 1)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts sobre {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @elseif($categoryLang->id == 2)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @foreach($categories as $category)
                                                <img src="{{ asset($category->image_path) }}" alt="imagen categoría dispositivo/periferico">
                                            @endforeach
                                            <p class="card-text">Listado de los posts relacionados con los dispositivos.</p>
{{--                                            @if($postLang->id == 2)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts sobre {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @elseif($categoryLang->id == 3)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            @foreach($categories as $category)
                                                <img src="{{ asset($category->image_path) }}" alt="imagen categoría noticias">
                                            @endforeach
                                            <p class="card-text">Listado de los posts relacionados con Internet.</p>
{{--                                            @if($postLang->id == 3)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts sobre {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @endif
                                    @elseif($categoryLang->lang_id == 2)
                                        @if($categoryLang->id == 4)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{asset('/public/images/Categoria_seguridad.PNG')}}" alt="imagen categoría seguridad">
                                            <p class="card-text">List of posts about security.</p>
{{--                                            @if($postLang->id == 1)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts about {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @elseif($categoryLang->id == 5)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{asset('/public/images/Categoria_dispositivo-periferico.PNG')}}" alt="imagen categoría dispositivo/periferico">
                                            <p class="card-text">List of posts about devices/peripherals.</p>
{{--                                            @if($postLang->id == 2)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts about {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @elseif($categoryLang->id == 6)
                                            <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                            <img src="{{asset('/public/images/Categoria_noticias.PNG')}}" alt="imagen categoría noticias">
                                            <p class="card-text">List of posts about  Internet.</p>
{{--                                            @if($postLang->id == 3)--}}
                                                <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.index', $categoryLang->id) }}">Posts about {{ $categoryLang->name }}</a>
{{--                                            @endif--}}
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
{{--                @endforeach--}}
            </div>

        </div>
    </div>

@endsection
