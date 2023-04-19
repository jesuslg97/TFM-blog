@extends('layouts.main')

@section('title')
    {{__('string.home_title')}}
@endsection

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-12 text-center mt-3">
                <h3><strong>¿Qué puedo hacer por ti?</strong></h3>
                <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto border-dark" style="width: 150px;">
            </div>

            <div class="col-6">
                <p>Si quieres empezar sobre lo último en tecnología tienes que dominar
                    el poder oculto de las palabras. Recuerda que tú también puedes hacerlo
                    y que nadie mejor que tú conoce tu negocio.</p>

                <p>Espero que todo lo que has leído en mi web te haya gustado y que te haya
                    despertado el gusanillo para meterte en el mundo de la informática y comentar
                    en nuestros posts.</p>

                <p><strong>Ahora mismo no podemos ofrecer más servicios de copywriting a la
                        carta. Estamos gestionando la larga lista de espera que tenemos.</strong></p>

                <p>Si tienes alguna pregunta sobre los posts publicados en el blog u
                    otras cuestiones que no estén resueltas en la página por favor escríbenos.</p>

                <p>Te respondemos en 48 horas y si podemos lo haremos antes, gracias.</p>

                <p>Si prefieres escribirnos directamente este es nuestro correo:<br>
                    <strong>info@blogviu.com</strong></p>

                <p>Jesús será la persona del equipo que te responda.</p>
            </div>

            <div class="col-4">
                <label for="name" class="form-label">Nombre</label>
                <input id="name" name="name" type="text"
                       placeholder="Nombre" class="form-control">

                <div class="mt-3">
                    <label for="email" class="form-label">Correo</label>
                    <input id="email" name="email" type="text"
                           placeholder="Correo" class="form-control">
                </div>

                <div class="mt-3">
                    <label for="information" class="form-label">Información</label>
                    <textarea id="information" name="information" type="text"
                              placeholder="Información" class="form-control" rows="6" cols="6"></textarea>
                </div>

                <div class="text-center mt-3">
                    <input type="submit" value="Enviar" class="btn btn-dark" name="createBtn">
                </div>
            </div>

        </div>
    </div>

@endsection
