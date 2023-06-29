@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_postLang')}}</h1>
                <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">

                <div class="row col-md-11 mt-5" style="text-align: left; margin-left: 5px">
                    <h5 class="text-decoration-underline"><strong>{{ $postsLang->title }}</strong></h5>
                    <span class="m-0">{{ $postsLang->description }}</span>
                    <span class="m-0">{{ $postsLang->information }}</span>
                </div>
            </div>

        </div>

        <div class="row card shadow mt-3">
            <div class="col-12">
                <h4 class="mt-1"><strong>Comentarios:</strong></h4>

                <div class="m-2">
                    @foreach($comments as $comment)
                        @foreach($users as $user)
                            @if($user->id == $comment->user_id)
                                <span><u>Comentario realizado por:</u> <strong>{{ $user->name }}</strong></span><br>
                                <span>{{ $comment->comment }}</span><br>
                                <hr class="mb-2 d-inline-block" style="border: 1px solid #F4600C; width: 300px;"><br>
                          @endif
                        @endforeach
                    @endforeach
                </div>

                <a class="btn btn-dark mb-2" href="{{ route('comments.create') }}">
                    <i class="bi bi-chat-square-text"></i> Añadir comentario
                </a>
            </div>
        </div>

    </div>
@endsection
