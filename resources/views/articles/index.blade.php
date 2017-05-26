@extends('layouts.master')

@section('content')

        <section class="head-title">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4 col-sm-offset-5 col-sm-2 text-center bg-head-title m-g-b-3 m-g-t-3">
                        <h1 class="birch fs-head-title">Les offres</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2">
                        <h1>nav categorie</h1>
                    </div>
                    <br>
                    <div class="col-md-10">
                        @forelse($articles as $article)

                        <div class="row">
                            <div class="col-md-4">
                                <img src="/images/annonce/{{ $article->image }}" style=" float:left; margin-right:25px;" class="img-responsive" alt="">

                            </div>

                            <div class="col-md-8">
                                <h2>{{ $article->title}}</h2>
                                <br>
                                <strong>Créé par {{$article->user->name }}</strong>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>{{ str_limit($article->content,150,2)}}</p>
                                    </div>
                                </div>
                                <a href="{{ route('article.show', $article->id) }}"><button class="btn btn-liste">Plus d'information  <span class="glyphicon glyphicon-chevron-right anim"></span></button></a>
                            </div>

                        </div>
                        <hr>
                        @empty
                            <h2>Aucun article</h2>
                        @endforelse
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </section>

@endsection
