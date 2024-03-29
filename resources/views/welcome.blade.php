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
                @foreach($categories as $category)
                    <div class="col-4">
                        <div class="card">
                            <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                <h5 class="card-title"><strong>{{ $category->name }}</strong></h5>
                                <img src="{{ asset('storage/images/categories/' . $category->image_path) }}"
                                     alt="imágenes categorías" style="width: 60%">
                                <p class="card-text">Listado de los posts relacionados con la {{ $category->name }}.</p>
                                <a class="btn text-white" style="background-color: #F4600C"
                                   href="{{ route('categories.show', $category->id) }}">Posts sobre {{ $category->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
