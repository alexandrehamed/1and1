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
                                            <h1>{{ $article->title}}</h1>
                                            <p>{{ $article->content}}</p>
                                            <br>
                                            <p>
                                                <a href="{{ route('article.show', $article->id) }}" class="btn btn-info">Voir</a>
                                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary">Editer</a>
                                            </p>
                                        </div>
                                    </div>

                            @empty
                                    <h1 class="section-heading">Vous n'avez pas encore d'annonces ! </h1>
                            @endforelse

                            </ul>



            </div>

    </div>
@endsection