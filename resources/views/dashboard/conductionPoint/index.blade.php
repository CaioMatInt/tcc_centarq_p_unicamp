
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-5"><i class="fa fa-comment-medical"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light-dark">
                        <tr>

                            <th width="45%" >Nome</th>
                            <th width="45%" >Descrição</th>
                            <th width="30%" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($resources as $resource)

                        <tr>

                            <td>{{$resource->name}}</td>
                            <td>{{$resource->description}}</td>




                            <td class="text-center">
                                <a href="{{route(''.$crudRouteName.'.edit', $resource->id)}}" class="btn btn-warning-alternative"><i class="fa fa-edit mr-1"></i></a>
                                <a>
                                    <form id="formDestroyConductionPoint" class="d-inline" method="POST" action="{{route(''.$crudRouteName.'.destroy', $resource->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button id="confirmDeletionOfConductionPoint" type="button" class="btn btn-danger-alternative"><i class="fa fa-trash mr-1"></i></button>

                                    </form>
                                </a>
                            </td>

                        </tr>


                        @empty

                            <td>Nenhum resultado.</td>

                        @endforelse
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

@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard/conductionPoint/index/conductionPointIndexFunctions.js')}}"></script>
@endpush
