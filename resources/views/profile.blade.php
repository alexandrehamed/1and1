@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="fiche">
                    <div class="head-fiche">
                        <img src="/images/avatar/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                        <h1 class="birch">Profile de {{ $user->name }}</h1>
                        <form enctype="multipart/form-data" action="{{route('profile.avatar')}}" method="POST">
                            <label>Changer l'avatar</label>
                            <input type="file" name="avatar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                            <input type="submit" class="btn btn-sm ">
                        </form>
                        <h3>Inscrit le : {{ $user->created_at }}</h3>
                    </div>
                    <div class="content-fiche">
                        <form method="POST" action="{{route('profile.update', $user->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <h3>Nom :</h3>
                            <input required type="text" value="{{$user->name}}" name="name" class="form-control">
                            <br>
                            <h3>email :</h3>
                            <input required type="text" value="{{$user->email}}" name="email" class="form-control">
                            <br>
                            <h3>telephone :</h3>
                            <input required type="text" value="{{$user->number}}" name="number" class="form-control">
                            <br>
                            <br>
                            <input type="submit" value="Sauvegarder" class="btn btn-form">
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection