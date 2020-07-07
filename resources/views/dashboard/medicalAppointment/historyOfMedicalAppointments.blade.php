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

                        <h5>Paciente: <span class="font-weight-bold">{{$resources[0]->userName}}</span></h5>

                        @if($resources)

                            @foreach($resources as $resource)

                            <div class="card mt-3">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Registro criado por:</span> {{$resource->createdByUserName}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Data da Consulta:</span> {{$resource->created_at}}
                                        </div>

                                    </div>

                                    <div class="mt-3 row">

                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Tipo de frequência:</span> {{$resource->frequency_type}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Unidade de saúde:</span> {{$resource->healthUnitName}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Observações:</span>
                                            @if($resource->observations)
                                                {{$resource->observations}}
                                            @else
                                                Sem observações
                                            @endif
                                        </div>

                                    </div>

                                    <hr />

                                    <div class="mt-2 row">

                                        <div class="col-12">
                                            <span class="font-weight-bold">Queixas apresentadas:</span>
                                            @foreach($resource->medicalAppointmentComplaints as $complaint)
                                                <span class="badge badge-info font-size-15px">
                                                    {{$complaint}}
                                                </span>

                                            @endforeach
                                        </div>

                                        <div class="mt-2 col-12">
                                            <span class="font-weight-bold">Pontos de condução:</span>
                                            @foreach($resource->medicalAppointmentConductionPoints as $conductionPoint)
                                                <span class="badge badge-info font-size-15px">
                                                    {{$conductionPoint}}
                                                </span>

                                            @endforeach
                                        </div>

                                    </div>

                                </div>

                            </div>

                            @endforeach

                        @else

                            <div class="card mt-3">

                                <div class="card-body">
                                    <div class="row">

                                        Sem registros.

                                    </div>
                                </div>
                            </div>


                        @endif




                            <br>
                            <div class="form-group">

                                <button type='button' class="btn btn-light"><a href="{{ URL::previous() }}">Cancelar</a></button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/i18n/pt-BR.min.js"></script>
    <script src="{{asset('/assets/js/dashboard/medicalAppointment/edit/medicalAppointmentEditFunctions.js')}}"></script>

@endpush


@push('custom-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

