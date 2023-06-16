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
    </div>
@endsection
