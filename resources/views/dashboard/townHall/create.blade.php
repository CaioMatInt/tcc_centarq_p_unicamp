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

                        <form action="" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <x-input-select-component :name="'city_id'" :label="'Cidade'" :options="$ibgeCitiesArray" />
                                </div>

                                <div class="col-12 col-sm-4">
                                    <x-input-image-component :name="'image'" :label="'Imagem'" />
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

