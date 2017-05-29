@extends('layouts.app')

@section('content')
    <style>
        body{
background-image: url("https://images.pexels.com/photos/159353/survey-opinion-research-voting-fill-159353.jpeg?w=940&h=650&auto=compress&cs=tinysrgb");
            background-size: cover;
            background-position: center;
        }
    </style>
    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 m-g-t-3 bg-form">
            <div class="">
                <div class="panel-heading birch ft-box text-center">Inscription<br><h1>Rejoignez notre communauté</h1></div>
                <div class="">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input id="name" type="text" class="form-control input-form" name="name" value="{{ old('name') }}" required autofocus placeholder="Nom">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-sm-8 col-sm-offset-2">
                                <input id="email" type="email" class="form-control input-form" name="email" value="{{ old('email') }}" required PLACEHOLDER="Email">

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
                            <div class="col-sm-8 col-sm-offset-2">
                                <input id="password-confirm" type="password" class="form-control input-form" name="password_confirmation" required placeholder="Confirmer">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class=" col-sm-offset-2 col-sm-8 text-center">
                                <button type="submit" class="btn btn-form">
                                    S'enregistrer
                                </button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
@endsection
