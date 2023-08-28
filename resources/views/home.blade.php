@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-2">
                    <div class="card-header" style="background-color: #FAEBD7">
                        <strong>¡Bienvenido!</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <span>
                            <strong>¡Felicidades! Se ha logueado correctamente en nuestro Blog,
                            disfrute al máximo de este sitio web. Saludos.</strong>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
