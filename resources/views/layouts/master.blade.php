<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Majord-Home</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/animate.css">

    <link rel="stylesheet" href="/css/app.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">

    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand birch nav-fs" href="{{ url('/') }}">
            <!-- {{ config('app.name', 'Laravel') }} -->
                Majord'Home
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a href="{{ url('/admin') }}">Admin</a>
                    </li>
                    <li>
                        <a href="{{ url('/article') }}">Les offres</a>
                    </li>
                    <li>
                        <a href="{{ url('/home') }}">Mes annonces</a>
                    </li>



                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Messages <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/messages">Voir les Messages @include('messenger.unread-count')</a></li>
                            <li><a href="/messages/create">Creer un nouveau message</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Images <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/showLists">Voir les Images </a></li>
                            <li><a href="imageUploadForm">upload une nouvelle image</a></li>
                        </ul>
                    </li>







                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <img src="/images/avatar/{{ Auth::user()->avatar }}" style="width:25px; height:25px; top:10px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>                        @endif
            </ul>
        </div>
    </div>
</nav>



    @yield('content')


<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <img class="img-responsive " src="{{url('/images/logoblanc.png')}}" style="color: white"/>
            </div>
            <div class="col-sm-2">
                <h5>Navigation</h5>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('logout') }}">Déconnexion</a></li>

                </ul>
            </div>
            <div class="col-sm-2">
                <h5>à propos</h5>
                <ul>
                    <li><a href="http://www.devinci.fr/le-pole/ecoles/iim-institut-de-linternet-et-du-multimedia/">Notre école</a></li>
                    <li><a href="https://fr.wikipedia.org/wiki/Harambe">le sponsor</a></li>

                </ul>
            </div>
            <div class="col-sm-2">
                <h5>Support</h5>
                <ul>
                    <li><a href="#">CGV</a></li>
                    <li><a href="#">Mentions légales</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
               <a href="https://www.facebook.com/romain.cakebool?fref=ts"><button type="button" class="btn btn-default" href="">Nous contacter</button></a>
            </div>
        </div>
    </div>

</footer>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58aacc995c54aec0"></script>
</body>
</html>