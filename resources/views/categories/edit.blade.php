@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.edit_category')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 300px;">
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form id="editCategories" enctype="multipart/form-data" name="create_category" action="{{ route('categories.update',$category) }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('string.category_name')}}</label>
                        <input id="name" name="name" type="text"
                               placeholder="{{__('string.category_name')}}" class="form-control" value="{{$category->name}}" required>
                    </div>

                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">{{__('string.category_image')}}</label>
                        <input id="categoryImage" name="categoryImage" type="file" class="form-control" value="{{$category->image_path}}" required>
                    </div>

                    <div class="col-12 text-center mb-2">
                        <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
