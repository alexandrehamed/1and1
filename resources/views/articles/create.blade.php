@extends('layouts.master')

@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    <div class="panel-body col-md-offset-1">

                        <h1>Création d'annonce</h1>

                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{route('article.store')}}">
                        {{csrf_field()}}
                            <label>Changer l'image</label>
                            <input type="file" name="image">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <br>
                        <input type="text" name="title" placeholder="Titre" class="form-control">
                        <br>
                            <textarea name="content" id="" class="form-control" rows="10"></textarea>
                        <br>
                            <select name="categorie_id" id="categorie">
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                            <br>
                        <input type="submit" value="Créer">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h1>Connectez-vous</h1>
    @endif
@endsection
