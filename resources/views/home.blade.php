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
                                </div>



                            @empty
                                <h1 class="section-heading">Vous n'avez pas encore d'annonces ! </h1>
                            @endforelse

                        </ul>
                        </div>
                </div>
            </section>

        @endsection