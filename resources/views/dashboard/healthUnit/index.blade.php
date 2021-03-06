
@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-xl-10">
                            <h3 class="page-table-title mb-4"><i class="fa fa-hospital"></i> <span class="ml-2">{{$pageTitle}}</span></h3>
                        </div>
                        <div class="col-12 col-xl-2 text-right mb-2">
                            <a href="{{route(''.$crudRouteName.'.create')}}" class="btn btn-success btn-block text-white"><i class="fa fa-plus"></i> Cadastrar</a>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light-dark">
                        <tr>

                            <th width="60%">Nome</th>
                            <th width="40%" class="text-center">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($resources as $resource)

                        <tr>

                            <td>{{$resource->name}}</td>

                            <td class="text-center">
                                <a href="{{route(''.$crudRouteName.'.edit', $resource->id)}}" class="btn btn-warning-alternative"><i class="fa fa-edit mr-1"></i></a>
                                <a>
                                    <form class="d-inline formDestroyHealthUnit" method="POST" action="{{route(''.$crudRouteName.'.destroy', $resource->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="button" class="btn btn-danger-alternative confirmDeletionOfHealthUnit"><i class="fa fa-trash mr-1"></i></button>

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


                </div>
            </div>
        </div>

        </div>

@endsection
@push('custom-scripts')
    <script src="{{asset('/assets/js/dashboard/healthUnit/index/healthUnitIndexFunctions.js')}}"></script>
@endpush

