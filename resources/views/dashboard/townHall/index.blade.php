
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
                            <button class="btn btn-success btn-block"><i class="fa fa-plus"></i> Cadastrar</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-light-dark">
                        <tr>

                            <th scope="col">Cidade</th>
                            <th scope="col">Imagem</th>
                            <th scope="col">Data Ativação</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($resources as $resource)

                        <tr>

                            <td>{{$resource->city->name}}</td>
                            <td>{{$resource->city->name}}</td>
                            <td>{{$resource->city->name}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>


                </div>
            </div>
        </div>

        </div>

@endsection
