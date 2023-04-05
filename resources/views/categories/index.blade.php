@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_category')}}</h1>
            </div>

            {{--<div class="col-md-4 form-inline">
                <form action="{{route('categories.index')}}" method="post">
                    @csrf
                    <input id="categoryImage" name="categoryImage" class="form-control"
                           value="@isset($categoryImage) {{$categoryImage}} @endisset" placeholder="{{__('string.search_category_image_placeholder')}}" />
                    <button type="submit" class="btn btn-dark">{{__('string.search_btn')}}</button>
                </form>
            </div>--}}

            <div class="col-12">
                @if(count($categories) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                        <th>{{__('string.id_header')}}</th>
                        <th>{{__('string.name_header')}}</th>
                        <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->image_path}}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('categories.edit', $category) }}">Editar</a>

                                    <form id="delete-form-{{ $category->id }}" action="{{ route('categories.delete', [$category]) }}"
                                          method="post" style="display: inline-block">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger"
                                                onclick = "return confirm('¿Realmente desea eliminar? Se borrarán también todos los posts asociados a esta categoria.')">
                                            {{__('string.delete_btn')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        Aún no existen categorías.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($categories instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$categories->links()}}
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('categories.create')}}">
                    {{__('string.create_category')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
