@extends('layout.master')

@section('content')


    <div class="row">

        <x-home-card :title="'Usuários'" :number="$totalOfUsers" :iconClass="'fa-users text-info'" />
        <x-home-card :title="'Tipos de Queixas'" :number="$totalOfComplaints" :iconClass="'fa-diagnoses text-warning'" />
        <x-home-card :title="'Consultas Cadastradas'" :number="$totalOfMedicalAppointments" :iconClass="'fa-notes-medical text-success'" />
        <x-home-card :title="'Pontos de Condução'" :number="$totalOfConductionPoints" :iconClass="'fa-comment-medical text-primary'" />


    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-4 main-session-titles">Últimas Consultas</h2>
                    <hr>

                    @foreach($lastMedicalAppointments as $medicalAppointment)

                    <div class="fluid-container">
                        <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">

                            <div class="col-12 col-sm-12 col-md-2 col-xl-2 text-center profile-image">
                                <img class="height-40px rounded-circle" src="{{$medicalAppointment->user->image}}" alt="profile image">
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                                Paciente:<span class="hall-town-health-unit-titles font-weight-bold mr-2 mb-0 no-wrap"> {{$medicalAppointment->user->name}}</span>
                            </div>

                            <div class="col-12 col-sm-12 col-md-4 col-xl-4">
                                <div class="d-flex">
                                    <p class="hall-town-health-unit-titles font-weight-bold mr-2 mb-0 no-wrap">Criado por: {{$medicalAppointment->createdByUser->name}}</p>
                                </div>
                                <div class="row text-gray d-md-flex d-none">
                                    <div class="col-12 d-flex">
                                        <small class="Last-responded mr-2 mb-0 text-muted text-muted">Adicionado em : {{$medicalAppointment->created_at}}</small>
                                    </div>
                                </div>
                            </div>



                            <div class="col-12 col-sm-12 col-md-2 col-xl-2">

                                <a href="{{route('consultas.show', $medicalAppointment->id)}}" class="btn btn-block btn-info-alternative"><i class="fa fa-eye"></i> Visualizar </a>

                            </div>

                            </div>

                    </div>


                    @endforeach




                </div>
            </div>
        </div>
    </div>



        @endsection


        @push('plugin-scripts')
            <script src="{{asset('/assets/plugins/chartjs/chart.min.js')}}"></script>
            <script src="{{asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
        @endpush

        @push('custom-scripts')
            <script src="{{asset('/assets/js/dashboard.js')}}"></script>

        @endpush
