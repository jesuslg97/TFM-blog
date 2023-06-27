@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_post')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <form name="create_post" enctype="multipart/form-data" action="{{ route('posts.store') }}" method="post">
                @csrf
                <div class="row col-12 offset-2">

                    <div class="col-4 mt-3">
                        <label for="postCategory" class="form-label">{{__('string.post_category')}}</label>
                        <br>
                        <select name="postCategory" id="postCategory" class="form-select" aria-label="Default select example">
                            <option selected>Elige una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->image_path}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-4 mt-3">
                        <label for="postImage" class="form-label">{{__('string.post_image')}}</label>
                        <input id="postImage" name="postImage" type="file"
                               placeholder="{{__('string.post_image')}}" class="form-control" required>
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
