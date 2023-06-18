@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.last_post')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
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
                        @foreach($postLangs->reverse() as $postLang)
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
                                    <a class="btn btn-secondary mb-1" href="{{ route('postsLang.show', $postLang->id) }}">Ver</a>
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

        </div>
    </div>
@endsection
