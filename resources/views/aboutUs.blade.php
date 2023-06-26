@extends('layouts.main')

@section('title')
    {{__('string.home_title')}}
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3">
                <h3><strong>Equipo de desarrollo</strong></h3>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto border-dark" style="width: 150px;">
            </div>

            <div class="col-10">
                <div class="row" style="border: 4px solid #F4600C;">
                    <div class="col-7">
                        <div class="card-body text-left">
                            <p><strong>Jesús López González</strong><br>
                                Graduado en Ingeniería Informática por la Universidad de Las Palmas de Gran Canaria
                                (ULPGC). Actualmente estudiante del Máster Universitario en Desarrollo de Aplicaciones
                                y Servicios Web por la Universidad Internacional de Valencia.<br>
                            </p>
                            Correo electrónico: <strong>jelopezgonzalez@gmail.com</strong>
                        </div>
                    </div>

                    <div class="col-3 offset-2 mt-3">
                        <img src="{{ asset('storage/images/recortada.JPG') }}"
                             alt="IMAGEN JESUS" class="w-75">
                    </div>
                </div>

                <div class="row mt-3" style="border: 4px solid #F4600C;">
                    <div class="col-7">
                        <div class="card-body text-left">
                            <strong>Rubén Martínez</strong><br>
                            Ingeniero informático. Más de 10 años de experiencia en:
                            <ul>
                                <li>Gestión de proyectos de desarrollo de aplicaciones Web y móvil.</li>
                                <li>Desarrollador de Front-End y de Back-End.</li>
                                <li>Desarrollador de aplicaciones móviles en nativo para Android.</li>
                            </ul>
                            Correo electrónico: <strong>ruben.martinez.a@campusviu.es</strong>
                        </div>
                    </div>

                    <div class="col-3 offset-2 mt-4">
                        <img src="{{asset('/storage/images/recortada.JPG')}}"
                             alt="IMAGEN RUBEN" class="w-75">
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
