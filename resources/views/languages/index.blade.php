@extends('layouts.main')

@section('title')
    {{__('string.list_title')}}
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row card shadow">

            <div class="col-12 text-center mt-3">
                <h1>{{__('string.list_title_language')}}</h1>
                <hr class="teal accent-3 mt-0 d-inline-block mx-auto border-dark" style="width: 200px;">
            </div>

            <div class="col-12">

                <div class="col-12 text-center mb-2">
                    <a class ="header__link btn btn-primary" href="{{route('languages.create')}}">
                        <i class="bi bi-database-add"></i> {{__('string.create_language')}}</a>
                </div>

                @if(count($languages) > 0)
                    <table class="table table-striped text-center mt-3">
                        <thead>
                        <th>{{__('string.id_header')}}</th>
                        <th>{{__('string.name_header')}}</th>
                        <th>{{__('string.language_ISO')}}</th>
                        <th colspan="2">{{__('string.actions_header')}}</th>
                        </thead>

                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td>{{$language->id}}</td>
                                <td>{{$language->name}}</td>
                                <td>{{$language->iso_code}}</td>

                                <td>
                                    <a class="btn btn-success" href="{{ route('languages.edit', $language) }}">
                                        <i class="bi bi-pencil"></i> Editar</a>

                                    <form id="delete-form-{{ $language->id }}" action="{{ route('languages.delete', [$language]) }}"
                                          method="post" style="display: inline-block">
                                        {{ method_field('delete') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" onclick = "return confirm('¿Realmente desea eliminar? Se borrará la posibilidad de escuchar y ver subtitulada la serie en ese idioma.')">
                                            <i class="bi bi-trash"></i> {{__('string.delete_btn')}}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning mt-2" role="alert">
                        Aún no existen idiomas.
                    </div>
                @endif
            </div>

            <div class="row my-3 pr-3">
                <div class="col">
                    <div class="float-right">
                        @if($languages instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{$languages->links()}}
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
