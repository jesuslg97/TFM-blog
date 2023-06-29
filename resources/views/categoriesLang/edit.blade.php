@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.edit_categoryLang')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <form name="create_categoryLang" action="{{ route('categoriesLang.update',$categoryLang) }}" method="post">
                @csrf
                <div class="row col-12">

                    <div class="row col-12 offset-2">
                        <div class="col-4 mt-3">
                            <label for="name" class="form-label">{{__('string.categoryLang_name')}}</label>
                            <input id="name" name="name" type="text"
                                   placeholder="{{__('string.categoryLang_name')}}" class="form-control" value="{{$categoryLang->name}}" required>
                        </div>

                        <div class="col-4 mt-3">
                            <label for="description" class="form-label">{{__('string.categoryLang_description')}}</label>
                            <input id="description" name="description" type="text"
                                   placeholder="{{__('string.categoryLang_description')}}" class="form-control" value="{{$categoryLang->description}}" required>
                        </div>
                    </div>

                    <div class="row col-12 offset-2">
                        <div class="col-4 mt-2">
                            <label for="langID" class="form-label">{{__('string.lang_name')}}</label>
                            <br>
                            <select name="langID" id="langID" class="form-select" aria-label="Default select example">

                                @foreach($languages as $language)
                                    @if($language->id == $categoryLang->lang_id)
                                        <option selected value="{{$language->id}}">{{$language->name}}</option>
                                    @else
                                        <option value="{{$language->id}}">{{$language->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-4 mt-2">
                            <label for="categoryId" class="form-label">{{__('string.category_image_path')}}</label>
                            <br>
                            <select name="categoryId" id="categoryId" class="form-select" aria-label="Default select example">

                                @foreach($categories as $category)
                                    @if($category->id == $categoryLang->category_id)
                                        <option selected value="{{$category->id}}">{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="col-12 text-center mt-2 mb-2">
                    <input type="submit" value="{{__('string.edit_btn')}}" class="btn btn-primary" name="createBtn">
                    <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
@endsection
