@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 mt-3">
                <div class="text-center">
                    <h1>{{ $postLang->title }}</h1>
                    <hr class="teal accent-3 mb-2 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
                </div>

                <div class="row mt-1">
                    @foreach($posts as $post)
                        @if($post->id == $postLang->post_id)
                            @foreach($users as $user)
                                @if($user->id == $post->author_id)
                                    <ul>
                                        <li>
                                            Nombre del autor del post: <strong>{{ $user->name }}</strong>
                                        </li>
                                        <li>
                                            Email del autor del post: <strong>{{ $user->email }}</strong>
                                        </li>
                                    </ul>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <span>
                    <u>Para cualquier duda contacte con el autor del post mediante su correo electrónico.</u>
                </span>

                <div class="row col-md-11 mt-3" style="text-align: left; margin-left: 5px">
                    <h5 class="text-decoration-underline"><strong>{{ $postLang->description }}</strong></h5>
                    <span class="text-justify mb-2">{{ $postLang->information }}</span>
                </div>
            </div>

        </div>

        <div class="row card shadow mt-3">
            <div class="col-12">
                <h4 class="mt-1"><strong>Comentarios:</strong></h4>
                @if(Auth::check())
                    <div class="m-2">
                        @foreach($comments as $comment)
                            @if($comment->postLang_id == $postLang->id)
                                @foreach($users as $user)
                                    @if($user->id == $comment->user_id)
                                        <span><u>Comentario realizado por:</u> <strong>{{ $user->name }}</strong></span><br>
                                        <span>{{ $comment->comment }}</span><br>
                                        <hr class="mb-2 d-inline-block" style="border: 1px solid #F4600C; width: 300px;"><br>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @endif

                <a class="btn btn-dark mb-2" href="{{ route('comments.create') }}">
                    <i class="bi bi-chat-square-text"></i> Añadir comentario
                </a>
            </div>
        </div>

    </div>
@endsection
