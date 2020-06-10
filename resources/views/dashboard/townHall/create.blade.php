@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route('prefeituras.index'), 'name' =>
                        'Cadastro de ' . $crudRouteName] ]" :pageTitle="$pageTitle"/>

                        <form id="formTwonHall" action="{{route(''.$crudRouteName.'.store')}}" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <x-input-hidden-component :name="'name'" />
                                    <x-input-select-component :name="'ibge_city_id'" :label="'Cidade'" :options="$ibgeCitiesArray" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-4">
                                    <x-input-image-component :name="'image'" :label="'Imagem'" />
                                </div>

                            </div>

                            <div class="card mt-2">
                                <div class="card-header">
                                    Administradores da prefeitura <a id="addNewAdmin" href="#" class="ml-3 btn btn-primary"><i class="fa fa-plus"></i> Adicionar novo</a>
                                </div>
                                <div class="card-body" id="listOfAdmins">

                                    <div class="row p-1 strippedAdminLine" id="adminLine1">

                                        <div class="col-12 col-sm-3">

                                            <x-input-type-component :name="'adminName[]'" :label="'Nome'" :type="'text'" :id="'adminName1'" />

                                        </div>

                                        <div class="col-12 col-sm-3">

                                            <x-input-type-component :name="'adminEmail[]'" :label="'E-mail'" :type="'email'" :id="'adminEmail1'" />

                                        </div>

                                        <div class="col-12 col-sm-3">

                                            <x-input-type-component :name="'adminRG[]'" :label="'RG'" :type="'number'" :id="'adminRG1'" />

                                        </div>

                                        <div class="col-12 col-sm-3">

                                            <label for="adminActions1">Ações</label>
                                            <div class="row" id="adminActions1">
                                                <a class="ml-3 btn btn-danger-alternative removeAdminButton" data-id-admin-selector="1"><i class="fa fa-trash"></i> Remover</a>
                                                <a class="ml-3 btn btn-warning-alternative cleanAdminInputsButton" data-id-admin-selector="1"><i class="fa fa-eraser"></i> Limpar</a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>


                            <br>
                            <div class="form-group">

                                <button type='button' class="btn btn-light"><a href="{{ URL::previous() }}">Cancelar</a></button>
                                <button type="button" class="btn btn-success mr-2 float-right" id="btnSaveTownHall">Salvar</button>
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

