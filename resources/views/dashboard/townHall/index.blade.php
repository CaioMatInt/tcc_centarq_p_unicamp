
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-5"><i class="fa fa-city"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light-dark">
                        <tr>

                            <th width="40%">Cidade</th>
                            <th width="20%">Imagem</th>
                            <th width="20%">Data Ativação</th>
                            <th class="text-center" width="20%">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)

                        <tr>

                            <td>{{$resource->city->name}}</td>
                            <td><img src="{{ url('storage/'.$resource->image) }}"></td>
                            <td>{{$resource->created_at->format('d/m/Y')}}</td>
                            <td class="text-center">
                                <a href="{{route(''.$crudRouteName.'.edit', $resource->id)}}" class="btn btn-warning-alternative"><i class="fa fa-edit mr-1"></i>Editar</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    </div>

                    <hr />

                    <div class="d-flex justify-content-end mt-5">
                        {{ $resources->links() }}
                    </div>

                </div>
            </div>
        </div>

        </div>

@endsection

