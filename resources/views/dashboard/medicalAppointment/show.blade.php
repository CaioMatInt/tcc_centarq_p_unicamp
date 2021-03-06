@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">

                        <div class="row content-head-title-breadcumb-reverse">

                            <div class="pageTitle col-12 col-xl-7">

                                <h4>{{ $pageTitle }}
                                    <a href="{{route('usuarios.medicalAppointmentsHistory', $resource->user->id)}}">
                                        <button class="ml-1 btn btn-success-alternative"><i class="fa fa-history"></i> Histórico do Paciente
                                        </button>
                                    </a>
                                </h4>

                            </div>
                            <div class="col-12 col-xl-5 pull-right text-center" style="display:block; flex-direction: column-reverse;">
                                <ol class="breadcrumb">
                                    <li><a href="{{route('home')}}"><i class="fa fa-home"></i> Painel</a></li>

                                    <span class="ml-1 mr-1">/</span>

                                        <li><a href="{{route($crudRouteName . '.index')}}">{{'Cadastro de ' . $pluralName}}</a></li>

                                        <span class="ml-1 mr-1">/</span>

                                    <li class="active">{{$pageTitle}}</li>

                                </ol>
                            </div>
                            <br>
                        </div>


                            <div class="card">

                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Paciente:</span> {{$resource->user->name}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Registro criado por:</span> {{$resource->createdByUser->name}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Data da Consulta:</span> {{$resource->date}}
                                        </div>

                                    </div>

                                    <div class="mt-3 row">

                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Tipo de frequência:</span> {{$resource->frequency_type}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Unidade de saúde:</span> {{$resource->healthUnit->name}}
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Criado em:</span> {{$resource->created_at}}
                                        </div>


                                    </div>

                                    <hr />

                                    <div class="mt-2 row">

                                        <div class="col-12">
                                            <span class="font-weight-bold">Queixas apresentadas:</span>
                                            @foreach($resource->medicalAppointmentComplaints as $complaint)
                                                <span class="badge badge-info font-size-15px">
                                                    {{$complaint->name}}
                                                </span>

                                            @endforeach
                                        </div>

                                        <div class="mt-2 col-12">
                                            <span class="font-weight-bold">Pontos de condução:</span>
                                            @foreach($resource->medicalAppointmentConductionPoints as $conductionPoint)
                                                <span class="badge badge-info font-size-15px">
                                                    {{$conductionPoint->name}}
                                                </span>

                                            @endforeach
                                        </div>

                                    </div>

                                    @if($resource->observations)

                                    <hr />

                                    <div class="mt-2 row">
                                        <div class="col-12 col-sm-12 col-md-12 col-xl-4">
                                            <span class="font-weight-bold">Observações:</span>

                                                {{$resource->observations}}
                                        </div>

                                    </div>

                                    @endif

                                </div>

                            </div>


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

