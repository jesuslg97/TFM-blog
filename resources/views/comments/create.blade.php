@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.create_comment')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <div class="col-12 mt-2">
                <form name="create_comment" action="{{ route('comments.store') }}" method="post">
                    @csrf

                    <div class="col-12">
                        <input id="userId" name="userId" type="hidden" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                    </div>

                    <div class="col-12 mb-3">
                        <label for="comment" class="form-label">{{__('string.comment')}}</label>
                        <input id="comment" name="comment" type="text"
                               placeholder="{{__('string.comment')}}" class="form-control" required>
                    </div>

                    <div class="col-12 text-center mt-2 mb-2">
                        <input type="submit" value="{{__('string.create_bn')}}" class="btn btn-primary" name="createBtn">
                        <a class="btn btn-warning text-white" href="{{ url()->previous() }}">Volver</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
