
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-5"><i class="fa fa-users"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table" id="user_datatable">
                        <thead class="thead-light-dark">
                        <tr>
                            <th>Imagem</th>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>RG</th>
                            <th class="text-center">Ações</th>
                        </tr>
                        </thead>
                    </table>
                    </div>



                </div>
            </div>
        </div>

        </div>

@endsection

@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard/user/index/userIndexFunctions.js')}}"></script>
    <script>
        /* DataTables Script*/

        $(document).ready( function () {


            /* Get the necessary routes from PHP to action buttons of the listing */
            let defaultEditRouteName = '{{route(''.$crudRouteName.'.edit', -1)}}';
            let defaultMedicalAppointmentHistoryRoute = '{{route('usuarios.medicalAppointmentsHistory', -1)}}';
            let ajaxListRoute = '{{ route(''.$crudRouteName.'.lista') }}';

            initUserDatatables(ajaxListRoute,defaultEditRouteName, defaultMedicalAppointmentHistoryRoute);

        });
    </script>
@endpush
