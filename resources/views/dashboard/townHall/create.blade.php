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

                            <div class="card mt-2">
                                <div class="card-header">
                                    Administradores da prefeitura
                                </div>
                                <div class="card-body">

                                    <div class="row" style="border: solid 1px black;">

                                        <div class="col-12 col-sm-4">

                                            <x-input-type-component :name="'adminName[]'" :label="'Nome'" :type="'text'" :id="'adminName1'" />

                                        </div>

                                        <div class="col-12 col-sm-4">

                                            <x-input-type-component :name="'adminEmail[]'" :label="'E-mail'" :type="'email'" :id="'adminEmail1'" />

                                        </div>

                                        <div class="col-12 col-sm-4">

                                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar</a>

                                        </div>


                                    </div>


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

