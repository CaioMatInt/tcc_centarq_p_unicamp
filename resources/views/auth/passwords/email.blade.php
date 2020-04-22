@extends('layouts.auth')

@section('content')


    <div class="row" style="height: 400px; background-color: white" >
        <div class="container center">

            <div class="item">

                <div class="col-12 text-center" style="background-color: white">
                    <img style="height: 100px" alt="logo" src="{{asset('assets/images/logo/logocentarq.svg')}}">

                </div>

            </div>
        </div>
    </div>


    <div class="text-center">

        <div class="row">
            <div class="offset-md-4 col-md-4 mt-5">
                <div class="card" style="width: 100%; border-color: #323366">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-body">


                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                        {{ csrf_field() }}

                                        <div class="text-left form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-12 control-label label-recuperacao">Recuperar senha</label>

                                            <div class="col-md-12">
                                                <input id="email" placeholder="&#xf0e0; E-mail" type="email" class="font-awesome-default form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                        <p class="error-returned">{{ $errors->first('email') }}</p>
                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-12">
                                                <button type="submit" class="purple-button-w-purple-border purple-button-w-purple-border-md btn btn-primary">
                                                    <i class="fa fa-share-square"></i> Enviar link de recuperação
                                                </button>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

