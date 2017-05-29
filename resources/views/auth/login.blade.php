@extends('layouts.app')

@section('content')
    <style>
        body{
            background-image: url("https://images.pexels.com/photos/39665/tax-forms-income-business-39665.jpeg?w=940&h=650&auto=compress&cs=tinysrgb");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            background-position: center;
            background-repeat:no-repeat ;
        }
    </style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-g-t-3 bg-form">
            <div class="">
                <div class="panel-heading birch ft-box text-center">Connexion</div>
                <div class="">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input id="email" type="email" class="form-control input-form" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-sm-8 col-sm-offset-2">
                                <input id="password" type="password" class="form-control input-form" name="password" required placeholder="Mot de passe">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Se souvenir de moi
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn btn-form">
                                    Connexion
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
