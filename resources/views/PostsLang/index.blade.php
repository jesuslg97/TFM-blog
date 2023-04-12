@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_postLang')}}</h1>
            </div>

            <div class="col-12">
                @if(count($postLangs) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                        <th>{{__('string.id_header')}}</th>
                        <th>{{__('string.lang_name')}}</th>
                        <th>{{__('string.post')}}</th>
                        <th>{{__('string.title')}}</th>
                        <th>{{__('string.description')}}</th>
                        <th>{{__('string.information')}}</th>
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
                                <td>
                                    @foreach($posts as $post)
                                        @if($post->id == $postLang->post_id)
                                            {{$post->image_path}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{$postLang->title}}</td>
                                <td>{{$postLang->description}}</td>
                                <td>{{$postLang->information}}</td>

                                <td>
                                    <a class="btn btn-success mb-1" href="{{ route('postsLang.edit', $postLang->id) }}">Editar</a>

                                    <form id="delete-form-{{ $postLang->id }}" action="{{ route('postsLang.delete', [$postLang]) }}"
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

            <div class="col-12 text-center mb-2">
                <a class ="header__link btn btn-primary" href="{{route('postsLang.create')}}">
                    {{__('string.create_postLang')}}<i class="fas fa-plus"></i></a>
                <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
            </div>

        </div>
    </div>
@endsection
