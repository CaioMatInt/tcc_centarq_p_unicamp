
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-5"><i class="fa fa-file-medical"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light-dark">
                        <tr>

                            <th width="80%">Nome</th>
                            <th class="text-center" width="20%">Ações</th>
                        </tr>
                        </thead>
                        <tbody>


                            @forelse($resources as $resource)

                            <tr>

                                <td>{{$resource->user_id}}</td>

                            </tr>


                            @empty

                            <td>Nenhum resultado.</td>

                            @endforelse

                        </tbody>
                    </table>
                    </div>


                </div>
            </div>
        </div>

        </div>

@endsection
