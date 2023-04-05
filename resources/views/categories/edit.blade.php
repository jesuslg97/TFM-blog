@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.edit_category')}}</h1>
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form id="editCategories" name="create_category" action="{{ route('categories.update',$category) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">{{__('string.category_image')}}</label>
                        <input id="categoryImage" name="categoryImage" type="text"
                               placeholder="{{__('string.category_image')}}" class="form-control" value="{{$category->image_path}}" required>
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
