@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_categoryLang')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <form name="create_categoryLang" action="{{ route('categoriesLang.store') }}" method="post">
                @csrf
                <div class="row col-12">

                    <div class="row col-12 offset-2">
                        <div class="col-4 mt-3">
                            <label for="name" class="form-label">{{__('string.categoryLang_name')}}</label>
                            <input id="name" name="name" type="text"
                                   placeholder="{{__('string.categoryLang_name')}}" class="form-control" required>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="description" class="form-label">{{__('string.categoryLang_description')}}</label>
                            <input id="description" name="description" type="text"
                                   placeholder="{{__('string.categoryLang_description')}}" class="form-control" required>
                        </div>
                    </div>

                    <div class="row col-12 offset-2">
                        <div class="col-4 mt-2">
                            <label for="langID" class="form-label">{{__('string.lang_name')}}</label>
                            <br>
                            <select name="langID" id="langID" class="form-select" aria-label="Default select example">
                                <option selected>Elige un idioma</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="categoryId" class="form-label">{{__('string.category_image_path')}}</label>
                            <br>
                            <select name="categoryId" id="categoryId" class="form-select" aria-label="Default select example">
                                <option selected>Elige una categoría</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->image_path}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-12 text-center mt-3 mb-3">
                    <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                    <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
