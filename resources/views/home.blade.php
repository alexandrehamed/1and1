        @extends('layouts.master')

        @section('content')

            <!-- Content Section -->
            <section class="head-title">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 col-sm-offset-5 col-sm-2 text-center bg-head-title m-g-b-3 m-g-t-3">
                            <h1 class="birch fs-head-title">Vos annonces</h1>
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <section class="home_annonces">
                <div class="container" id="articles">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                        <ul>
                            @forelse(Auth::user()->articles as $article)
                                <br>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h1>{{ $article->title}}</h1>
                                        <p>{{ $article->content}}</p>
                                        <p>
                                            <a href="{{ route('article.show', $article->id) }}"><button class="btn btn-liste">Voir cette annonce  <span class="glyphicon glyphicon-eye-open"></span></button></a>

                                            <a href="{{ route('article.edit', $article->id) }}"><button class="btn btn-liste">Modifier cette annonce  <span class="glyphicon glyphicon-pencil"></span> </button></a>
                                        </p>
                                    </div>
                                </div>


                            @empty
                                <h1 class="section-heading">Vous n'avez pas encore d'annonces ! </h1>
                            @endforelse

                        </ul>
                        </div>
                </div>
            </section>

        @endsection