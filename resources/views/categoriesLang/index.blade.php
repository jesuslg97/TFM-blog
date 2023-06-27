@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            @if(Auth::id() == 1)
                <div class="col-12 text-center mt-3">
                    <h1>{{__('string.list_title_categoryLang')}}</h1>
                    <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
                </div>

                <div class="col-12">

                    <div class="col-12 text-center mb-2">
                        <a class ="header__link btn btn-primary" href="{{route('categoriesLang.create')}}">
                            <i class="bi bi-database-add"></i> {{__('string.create_categoryLang')}}</a>
                    </div>

                    @if(count($categoryLangs) > 0)
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
                                                <img src="{{ asset('storage/images/categories/' . $category->image_path) }}"
                                                     alt="imágenes categorías" style="width: 20%">
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$categoryLang->name}}</td>
                                    <td>{{$categoryLang->description}}</td>

                                    <td>
                                        <a class="btn btn-success mb-1" href="{{ route('categoriesLang.edit', $categoryLang->id) }}">
                                            <i class="bi bi-pencil"></i> Editar</a>

                                        <form id="delete-form-{{ $categoryLang->id }}" action="{{ route('categoriesLang.delete', [$categoryLang]) }}"
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
            @endif
        </div>
    </div>
@endsection
