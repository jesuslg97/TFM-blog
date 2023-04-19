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

            <div class="col-12">
                <div class="row">
                    <div class="col-6" style="border: 4px solid #F4600C;">
                        <div class="card-body text-left">
                            <p><strong>Jesús López González</strong><br>
                                Graduado en Ingeniería Informática por la Universidad de Las Palmas de Gran Canaria
                                (ULPGC). Actualmente estudiante del Máster Universitario en Desarrollo de Aplicaciones
                                y Servicios Web por la Universidad Internacional de Valencia.<br>
                                Correo electrónico: <strong>jelopezgonzalez@gmail.com</strong>
                            </p>
                        </div>

                        <div class="col-4">
                            <img src="{{asset('/public/images/imagen_jesus.PNG')}}" alt="imagen jesus">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 mt-3" style="border: 4px solid #F4600C;">
                        <div class="card-body text-left">
                            <p><strong>Rubén Martínez</strong><br>
                                Ingeniero informático.
                                Más de 10 años de experiencia en:
                            <ul>
                                <li>Gestión de proyectos de desarrollo de aplicaciones Web y móvil.</li>
                                <li>Desarrollador de Front-End y de Back-End.</li>
                                <li>Desarrollador de aplicaciones móviles en nativo para Android.</li>
                            </ul>
                            Correo electrónico: <strong>ruben.martinez.a@campusviu.es</strong>
                            </p>
                            <img src="{{asset('/public/images/imagen_ruben.PNG')}}" alt="imagen ruben">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
