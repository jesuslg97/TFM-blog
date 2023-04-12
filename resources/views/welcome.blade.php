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
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                            <h5 class="card-title"><strong>Seguridad</strong></h5>
                            <p class="card-text">Listado de los posts relacionados con la seguridad.</p>
                            <a class="btn text-white" style="background-color: #F4600C" href="{{route('categories.index')}}">Posts sobre seguridad</a>
                        </div>
                    </div>
                </div>

                <div class="col-4 m-3">
                    <div class="card">
                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                            <h5 class="card-title"><strong>Dispositivos/Periféricos</strong></h5>
                            <p class="card-text">Listado de los posts relacionados con los dispositivos.</p>
                            <a class="btn text-white" style="background-color: #F4600C" href="{{route('categories.index')}}">Posts sobre dispositivos</a>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center" style="border: 4px solid #F4600C;">
                            <h5 class="card-title"><strong>Noticias</strong></h5>
                            <p class="card-text">Listado de los posts relacionados con Internet.</p>
                            <a class="btn text-white" style="background-color: #F4600C" href="{{route('categories.index')}}">Posts sobre Internet</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
