@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_post')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 100px;">
            </div>

            <div class="col-12">

                <div class="col-12 text-center mb-2">
                    <a class ="header__link btn btn-primary" href="{{route('posts.create')}}">
                        <i class="bi bi-database-add"></i> {{__('string.create_post')}}</a>
                </div>

                @if(count($posts) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                            <th>{{__('string.id_header')}}</th>
                            <th>{{__('string.post_category')}}</th>
                            <th>{{__('string.post_image')}}</th>
                            <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>@foreach($categories as $category)
                                        @if($category->id == $post->category_id)
                                            {{$category->image_path}}
                                        @endif
                                    @endforeach</td>
                                <td>{{$post->image_path}}</td>

                                <td>
                                    <a class="btn btn-success mb-1" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="bi bi-pencil"></i> Editar</a>

                                    <form id="delete-form-{{ $post->id }}" action="{{ route('posts.delete', [$post]) }}"
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
                        Aún no existen posts.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$posts->links()}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
