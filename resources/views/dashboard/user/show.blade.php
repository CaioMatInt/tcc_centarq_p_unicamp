@extends('layout.master')

@section('pageTitle', $pageTitle)

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin">
                <div class="card">
                    <div class="card-body">


                        <x-breadcumb-user-location-component :previousLinks="[0 => ['link' => route($crudRouteName . '.index'), 'name' =>
                        'Visualização de ' . $pluralName]]" :pageTitle="$pageTitle"/>

                        <div class="offset-md-0 col-md-12 offset-xl-3 col-xl-6 mt-5">
                            <div class="card">

                                <div class="panel-body">
                                    <div class="text-center p-3">
                                        <img class="rounded-circle max-width-100pct max-height-100px" src="{{ url($resource->image) }}">
                                    </div>
                                    <h2 class="font-semibold text-center name-user-information">{{ $resource->name }}</h2>

                                    <table class="table table-alternative-striped mt-5 max-width-100pct table-user-information">
                                        <tbody>
                                        <tr>

                                            <td class="td-user-information"><i class="fa fa-id-card mr-1 text-purple"></i>RG</td>
                                            <td class="td-user-information"><span class="label label-success">{{ $resource->rg }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td-user-information"><i class="fa fa-envelope mr-1 text-purple"></i>Email</td>
                                            <td class="td-user-information"><span class="label label-success">{{ $resource->email }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td-user-information"><i class="fa fa-venus-mars mr-1 text-purple"></i>Gênero</td>
                                            <td class="td-user-information"><span class="label label-success">{{ $resource->gender->name }}</span></td>
                                        </tr>
                                        <tr>
                                            <td class="td-user-information"><i class="fa fa-user-tag mr-1 text-purple"></i>Tipo</td>
                                            <td class="td-user-information"><span class="label label-success">{{ $resource->userType->name }}</span></td>
                                        </tr>

                                        <tr>
                                            <td class="td-user-information"><i class="fa fa-calendar-week mr-1 text-purple"></i>Criação</td>
                                            <td class="td-user-information">{{ $resource->created_at }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>

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


