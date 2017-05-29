<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/avatar/default.png') }}">
    <title>Majord'Home</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Styles -->

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand birch nav-fs" href="#">Majord'Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right birch">
                @if (Route::has('login'))
                    @if (Auth::check())
                        <li><a href="{{url('/home')}}" class="nav-fs">Home</a></li>
                    @else
                        <li><a href="{{ url('/register') }}" class="nav-fs"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
                        <li><a href="{{ url('/login') }}" class="nav-fs"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    @endif
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<section class="bg-home">

    <div class="container">
        <div class="row">
            <div class=" m-g-t-10 col-md-offset-3 col-sm-offset-3 col-sm-6">
                <div class="animated fadeInDown">
                    <img class="img-responsive " src="{{url('/images/logoblanc.png')}}" style="color: white"/>
                </div>
            </div>

        </div>
    </div>
<section class="box footer navbar-fixed-bottom ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 box-1 text-center grow pic">
                <h1 class="birch ft-box">Qui sommes nous ?</h1>
                <a href="{{ url('/aboutus') }}"><button class="btn btn-lg  btn-1 btn-style">En savoir plus</button></a>
            </div>
            <div class="col-sm-6 box-2 text-center">
               <h1 class="birch ft-box">Consulter les offres</h1>

                <a href="{{ url('/article') }}"><button class="btn btn-lg btn-2 btn-style">En savoir plus</button></a>
            </div>
        </div>
    </div>
</section>

</section>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

    })
</script>
</body>
</html>