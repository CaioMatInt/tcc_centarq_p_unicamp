@extends('layouts.auth')

@section('content')


    <div class="row background-white h-400px">
        <div class="container center">

            <div class="item">

                <div class="col-12 text-center background-white">
                    <img class="logo-auth-pages" alt="logo" src="{{asset('assets/images/logo/logocentarq.svg')}}">

                </div>

            </div>
        </div>
    </div>


    <div class="text-center">

        <div class="row">
            <div class="hd-screen-hack offset-0 col-12 offset-sm-1 col-sm-10 offset-xl-4 col-xl-4 mt-5">
                <div class="card w-100 border-strong-purple">
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="panel panel-default">

                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                        {{ csrf_field() }}

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                                            <div class="offset-1 col-10">
                                                <label for="email" hidden class="col-md-4 control-label">Email</label>
                                                <input id="email"
                                                       placeholder="&#xf0e0; E-mail" type="email" class="font-awesome-default form-control" name="email" value="{{ 'admin@admin.com',old('email') }}" required autofocus>

                                            </div>

                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">


                                            <div class="offset-1 col-10">
                                                <label for="password" hidden class="col-md-4 control-label">Password</label>
                                                <input id="password"
                                                       placeholder="&#xf11c; Senha" type="password" class="font-awesome-default form-control" name="password" value="admin123456" required>

                                                @if ($errors->has('email') || $errors->has('password'))
                                                    <span class="help-block">
                                                        <p class="error-returned">E-mail ou senha incorretos, por favor, tente novamente.</p>
                                                     </span>
                                                @endif
                                            </div>

                                        </div>

                                        <div class="offset-1 col-10">

                                            <div class="row">

                                                <div class="col-md-6 text-left">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Lembrar-me
                                                        </label>
                                                    </div>
                                                    <div>
                                                    <a class="m-0 p-0 btn btn-link " href="{{ route('password.request') }}">
                                                        Esqueceu sua senha?
                                                    </a>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 text-right">

                                                    <button type="submit" class="pr-4 pl-4 btn-info purple-button-w-green-border purple-button-w-border-xl">
                                                        <i class="fa fa-sign-in-alt"></i>
                                                        Entrar
                                                    </button>
                                                </div>
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
