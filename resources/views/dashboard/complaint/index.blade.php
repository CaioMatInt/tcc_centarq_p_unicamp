
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-4"><i class="fa fa-diagnoses"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table" id="complaints_datatable">
                        <thead class="thead-light-dark">
                        <tr>

                            <th width="70%" >Nome</th>
                            <th width="30%" class="text-center">Ações</th>
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
    <script src="{{asset('/assets/js/dashboard/complaint/index/complaintIndexFunctions.js')}}"></script>

    <script>
        /* DataTables Script*/

        $(document).ready( function () {
            /* Get the necessary routes from PHP to action buttons of the listing */
            let defaultEditRouteName = '{{route(''.$crudRouteName.'.edit', -1)}}';
            let defaultDestroyRouteName = '{{route(''.$crudRouteName.'.destroy', -1)}}';
            let ajaxListRoute = '{{ route(''.$crudRouteName.'.lista') }}';
            let csrf_token_field = '{{ csrf_field() }}';

            initComplaintDatatables(ajaxListRoute,defaultEditRouteName, defaultDestroyRouteName, csrf_token_field);

        });

    </script>
@endpush
