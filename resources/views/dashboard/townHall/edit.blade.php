@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route('prefeituras.index'), 'name' =>
                        'Cadastro de Prefeituras'] ]" :pageTitle="$pageTitle"/>

                        <form id="formTwonHall" action="{{route(''.$crudRouteName.'.update', $resource->id)}}" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">


                                <div class="col-12 col-sm-12 col-md-6">

                                    Imagem Atual:
                                    <div class="mt-2">
                                    <img class="max-width-150px" src="{{ url('storage/'.$resource->image) }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6">
                                    Alterar Imagem:
                                    <x-input-image-component :name="'image'" />
                                </div>



                            </div>

                            <div class="card mt-5">
                                <div class="card-header">
                                    Administradores da prefeitura
                                </div>
                                <div class="card-body">


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

@endpush

