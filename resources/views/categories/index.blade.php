@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_category')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <div class="col-12">

                <div class="col-12 text-center mb-2">
                    <a class ="header__link btn btn-primary" href="{{route('categories.create')}}">
                        <i class="bi bi-database-add"></i> {{__('string.create_category')}}</a>
                </div>

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
                                <td>{{$category->image_path}}
                                    <img src="{{ asset('storage/images/categories/' . $category->image_path) }}"
                                         alt="imágenes categorías" style="width: 20%">
                                </td>
                                <td>
                                    <a class="btn btn-success mb-1" href="{{ route('categories.edit', $category) }}">
                                        <i class="bi bi-pencil"></i> Editar</a>

                                    <form id="delete-form-{{ $category->id }}" action="{{ route('categories.delete', [$category]) }}"
                                          method="post" style="display: inline-block">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger"
                                                onclick = "return confirm('¿Realmente desea eliminar? Se borrarán también todos los posts asociados a esta categoria.')">
                                            <i class="bi bi-trash"></i> {{__('string.delete_btn')}}</button>
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

        </div>
    </div>
@endsection
