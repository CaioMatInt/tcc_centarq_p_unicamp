@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route($crudRouteName . '.index'), 'name' =>
                        'Cadastro de ' . $pluralName] ]" :pageTitle="$pageTitle"/>

                        <form action="{{route(''.$crudRouteName.'.store')}}" method="post" enctype="multipart/form-data">
                            {{ @csrf_field() }}
                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-select-component :name="'user_id'" :label="'Paciente'" :options="[]" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-select-component :name="'health_unit_id'" :label="'Unidade de Saúde'" :options="$healthUnitsArray" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-multiple-select2-component :id="'complaintsSelect'" :name="'complaints'" :label="'Queixa(s)'" :options="$complaintsArray" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-multiple-select2-component :id="'conductionPointsSelect'" :name="'conductionPoints'" :label="'Ponto(s) de Conduta'" :options="$conductionPointsArray" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                    <x-input-type-component :type="'text'" :name="'observations'" :label="'Observações'" />
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/i18n/pt-BR.min.js"></script>
    <script src="{{asset('/assets/js/dashboard/medicalAppointment/create/medicalAppointmentCreateFunctions.js')}}"></script>

@endpush

@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

