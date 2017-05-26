@extends('layouts.master')

@section('content')




    <body>



    <!-- Full Width Image Header with Logo -->
    <!-- Image backgrounds are set within the full-width-pics.css file. -->
    <header class="image-bg-fluid-height">
        <div class="back-head">


            <h1 class="section-heading">Bonjour, {{Auth::user()->name}}</h1>

        </div>

    </header>

    <!-- Content Section -->
    <section id="section1">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 CLASS="titre section-titre">MES ANNONCES</h1>
                    <p class="lead section-lead">Voici la liste des annonces que vous avez publiez, n'hésitez pas à les modifier !</p>

                </div>
            </div>
        </div>
    </section>
    <div class="container" id="articles">


            <div class="col-md-8 col-md-offset-2">

                            <ul>
                            @forelse(Auth::user()->articles as $article)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img src="/images/annonce/{{ $article->image }}" style=" float:left; margin-right:25px;" class="img-responsive" alt="">

                                                </div>

                                                <div class="col-md-8">
                                                    <h2>{{ $article->title}}</h2>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <p>{{ str_limit($article->content,150,2)}}</p>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('article.show', $article->id) }}"><button class="btn btn-liste">Plus d'information  <span class="glyphicon glyphicon-chevron-right anim"></span></button></a>
                                                    <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Editer</a>
                                                    <form method="POST" action="{{ route('article.destroy', $article->id) }}">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input value="Supprimer" type="submit" class="btn btn-danger">
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                            @empty
                                    <h1 class="section-heading">Vous n'avez pas encore d'annonces ! </h1>
                            @endforelse

                            </ul>



            </div>

    </div>
@endsection