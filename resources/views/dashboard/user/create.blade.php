@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route($crudRouteName . '.index'), 'name' =>
                        'Cadastro de ' . $pluralName]]" :pageTitle="$pageTitle"/>

                        <form action="{{route(''.$crudRouteName.'.store')}}" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-type-component :name="'name'" :label="'Nome'" :type="'text'" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-type-component :name="'rg'" :label="'RG'" :type="'text'" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-type-component :name="'email'" :label="'Email'" :type="'email'" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-select-component :id="'userTypeSelect'" :name="'user_type_id'" :label="'Tipo de Usuário'" :options="$userTypesArray" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-image-component :name="'image'" :label="'Imagem'" />
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-select-component :id="'genderSelect'" :name="'gender_id'" :label="'Gênero'" :options="$gendersArray" />
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


