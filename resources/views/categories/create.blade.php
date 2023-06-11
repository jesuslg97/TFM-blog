@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_category')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <div class="offset-md-4 col-4 mt-3">
                <form name="create_category" enctype="multipart/form-data" action="{{ route('categories.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryImage" class="form-label">{{__('string.category_image')}}</label>
                        <input id="categoryImage" name="categoryImage" type="file" class="form-control" required>
                    </div>

                    <div class="col-12 text-center mb-2">
                        <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
