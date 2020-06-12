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

                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-select-component :name="'town_hall_id'" :label="'Prefeitura'" :options="$townHallsArray" />
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">

                                </div>



                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <label for="selectUser">Nome do paciente</label>
                                    <select id="selectUser" style="width:100%!important;">

                                    </select>
                                </div>


                                <div class="col-12 col-sm-12 col-md-12 col-xl-3">
                                    <x-input-file-component :name="'exam'" :label="'Exame'" />
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/i18n/pt-BR.min.js"></script>
@endpush

@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

