@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_postLang')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <form name="create_postLang" enctype="multipart/form-data" action="{{ route('postsLang.store') }}" method="post">
                @csrf
                <div class="row col-12">

                    <div class="row col-12 offset-2">
                        <input id="authorId" name="authorId" type="hidden"
                               value="{{\Illuminate\Support\Facades\Auth::id()}}" class="form-control">

                        <div class="row col-12">
                            <div class="col-4 mt-3">
                                <label class="form-label">{{__('string.author_name')}}</label>
                                <input type="text" placeholder="{{__(\Illuminate\Support\Facades\Auth::user()->name)}}"
                                       class="form-control" disabled>
                            </div>

                            <div class="col-4 mt-3">
                                <label class="form-label">{{__('string.author_email')}}</label>
                                <input type="text" placeholder="{{\Illuminate\Support\Facades\Auth::user()->email}}"
                                       class="form-control" disabled>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col-3 mt-3">
                                <label for="postImage" class="form-label">{{__('string.post_image')}}</label>
                                <input id="postImage" name="postImage" type="file"
                                       placeholder="{{__('string.post_image')}}" class="form-control" required>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="postCategory" class="form-label">{{__('string.post_category')}}</label>
                                <br>
                                <select name="postCategory" id="postCategory" class="form-select" aria-label="Default select example">
                                    <option selected>Elige una categoría</option>
                                    @foreach($categoriesLang as $categoryLang)
                                        <option value="{{$categoryLang->id}}">{{$categoryLang->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="langID" class="form-label">{{__('string.lang_name')}}</label>
                                <br>
                                <select name="langID" id="langID" class="form-select" aria-label="Default select example">
                                    <option selected>Elige un idioma</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col-8 mt-3">
                                <label for="title" class="form-label">{{__('string.postLang_title')}}</label>
                                <input id="title" name="title" type="text"
                                       placeholder="{{__('string.postLang_title')}}" class="form-control" required>
                            </div>
                        </div>

                        <div class="row col-12">
                            <div class="col-8 mt-2">
                                <label for="information" class="form-label">{{__('string.postLang_information')}}</label>
                                <textarea class="ckeditor form-control" name="information" id="information" rows="5" cols="80"></textarea>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-12 text-center mt-2 mb-2">
                    <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                    <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
