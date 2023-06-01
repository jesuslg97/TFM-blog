@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            @if(Auth::id() == 1)
                <div class="col-12 text-center mt-3">
                    <h1>{{__('string.list_title_categoryLang')}}</h1>
                </div>

                <div class="col-12">
                    @if(count($categoryLangs) > 0)

                        <div class="col-12 text-center mb-2">
                            <a class ="header__link btn btn-primary" href="{{route('categoriesLang.create')}}">
                                {{__('string.create_categoryLang')}}<i class="fas fa-plus"></i></a>
                            <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                        </div>

                        <table class="table table-striped text-center mt-3">
                            <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.lang_name')}}</th>
                            <th>{{__('string.category')}}</th>
                            <th>{{__('string.name')}}</th>
                            <th>{{__('string.description')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                            </thead>

                            <tbody>
                            @foreach($categoryLangs as $categoryLang)
                                <tr>
                                    <td>{{$categoryLang->id}}</td>
                                    <td>
                                        @foreach($languages as $language)
                                            @if($language->id == $categoryLang->lang_id)
                                                {{$language->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($categories as $category)
                                            @if($category->id == $categoryLang->category_id)
                                                {{$category->image_path}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$categoryLang->name}}</td>
                                    <td>{{$categoryLang->description}}</td>

                                    <td>
                                        <a class="btn btn-success mb-1" href="{{ route('categoriesLang.edit', $categoryLang->id) }}">Editar</a>

                                        <form id="delete-form-{{ $categoryLang->id }}" action="{{ route('categoriesLang.delete', [$categoryLang]) }}"
                                              method="post" style="display: inline-block">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger" onclick = "return confirm('¿Realmente desea eliminar?')">
                                                {{__('string.delete_btn')}}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning mt-2" role="alert">
                            Aún no existen categorías en diferentes idiomas.
                        </div>
                    @endif
                </div>

                <div class="row my-3 pr-3">
                    <div class="col">
                        <div class="float-right">
                            @if($categoryLangs instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                {{$categoryLangs->links()}}
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
                    @foreach($categoryLangs as $categoryLang)
                        <div class="col-4">
                            <div class="card mb-2">
                                <div class="card-body text-center" style="border: 4px solid #F4600C;">
                                    @if($categoryLang->id == 1)
                                        <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_seguridad.PNG')}}" alt="imagen categoría seguridad">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre seguridad</a>
                                    @elseif($categoryLang->id == 2)
                                        <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_dispositivo-periferico.PNG')}}" alt="imagen categoría dispositivo/periferico">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre dispositivos</a>
                                    @elseif($categoryLang->id == 3)
                                        <h5 class="card-title"><strong>{{ $categoryLang->name }}</strong></h5>
                                        <img src="{{asset('/public/images/Categoria_noticias.PNG')}}" alt="imagen categoría noticias">
                                        <p class="card-text">Para más información clique en el siguiente botón.</p>
                                        <a class="btn text-white" style="background-color: #F4600C" href="{{ route('postsLang.show', $categoryLang->id) }}">Posts sobre Internet</a>
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
