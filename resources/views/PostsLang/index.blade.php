@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            @if(Auth::id() == 1)
                <div class="col-12 text-center mt-3">
                    <h1>{{__('string.list_title_postLang')}}</h1>
                    <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
                </div>

                <div class="col-12">

                    <div class="col-12 text-center mb-2">
                        <a class ="header__link btn btn-primary" href="{{route('postsLang.create')}}">
                            <i class="bi bi-database-add"></i> {{__('string.create_postLang')}}</a>
                    </div>

                    @if(count($postLangs) > 0)
                        <table class="table table-striped text-center mt-3">
                            <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.lang_name')}}</th>
                            <th>{{__('string.title')}}</th>
                            <th>{{__('string.post')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                            </thead>

                            <tbody>
                            @foreach($postLangs as $postLang)
                                <tr>
                                    <td>{{$postLang->id}}</td>
                                    <td>
                                        @foreach($languages as $language)
                                            @if($language->id == $postLang->lang_id)
                                                {{$language->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$postLang->title}}</td>
                                    <td>
                                        @foreach($posts as $post)
                                            @if($post->id == $postLang->post_id)
                                                <img src="{{ asset('storage/images/posts/' . $post->image_path) }}"
                                                     alt="imágenes posts" style="width: 30%">
                                            @endif
                                        @endforeach
                                    </td>

                                    <td>
                                        <a class="btn btn-secondary mb-1" href="{{ route('postsLang.show', $postLang->id) }}">Ver</a>
                                        <a class="btn btn-success mb-1" href="{{ route('postsLang.edit', $postLang->id) }}">
                                            <i class="bi bi-pencil"></i> Editar</a>

                                        <form id="delete-form-{{ $postLang->id }}" action="{{ route('postsLang.delete', [$postLang]) }}"
                                              method="post" style="display: inline-block">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" onclick = "return confirm('¿Realmente desea eliminar?')">
                                                <i class="bi bi-trash"></i> {{__('string.delete_btn')}}</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning mt-2" role="alert">
                            Aún no existen posts en diferentes idiomas.
                        </div>
                    @endif
                </div>

                <div class="row my-3 pr-3">
                    <div class="col">
                        <div class="float-right">
                            @if($postLangs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{$postLangs->links()}}
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <div class="col-12 text-center mt-3">
                    <h1>Posts sobre seguridad</h1>
                    <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
                </div>

                <div class="m-1 text-center">
                    <p>En esta página podemos encontrar varios posts relacionados con el tema de la seguridad
                        en los dispositivos tecnológicos, ya sea para describir consejos, realizar cambios...</p>
                </div>

                <div class="col-12 d-flex align-items-center justify-content-center">
                    @foreach($postLangs as $postLang)
                        <div class="col-4">
                            <div class="card mb-2">
                                <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                    @if($postLang->id == 1)
                                        <h5 class="card-title"><strong>{{ $postLang->title }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_seguridad.PNG')}}" alt="imagen categoría seguridad">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $postLang->id) }}">Posts sobre seguridad</a>
                                    @elseif($postLang->id == 2)
                                        <h5 class="card-title"><strong>{{ $postLang->title }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_dispositivo-periferico.PNG')}}" alt="imagen categoría dispositivo/periferico">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $postLang->id) }}">Posts sobre dispositivos</a>
                                    @elseif($postLang->id == 3)
                                        <h5 class="card-title"><strong>{{ $postLang->title }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_noticias.PNG')}}" alt="imagen categoría noticias">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $postLang->id) }}">Posts sobre Internet</a>
                                   @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection
