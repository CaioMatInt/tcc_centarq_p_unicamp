@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route('tipos-de-exame.index'), 'name' =>
                        'Cadastro de ' . $crudRouteName] ]" :pageTitle="$pageTitle"/>

                        <form action="{{route(''.$crudRouteName.'.store')}}" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-type-component :name="'name'" :label="'Nome'" :type="'text'" />
                                </div>

                            </div>

                            <br>
                            <div class="form-group">

                                <button type='button' class="btn btn-light"><a href="{{ URL::previous() }}">Cancelar</a></button>
                                <button type="submit" class="btn btn-success mr-2 float-right">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard/townhall/create/townHallCreateViewfunctions.js')}}"></script>
@endpush

