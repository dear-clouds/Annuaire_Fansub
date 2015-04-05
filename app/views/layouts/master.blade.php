<!DOCTYPE html>
<html>
<head>
    <title>Annuaire Fansub
        @section('title')
        @show
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    
    {{ HTML::script('js/jquery-1.11.1.min.js') }}
    {{ HTML::script('js/jquery-ui.min.js') }}
    {{ HTML::script('js/jquery.transit.min.js') }}
    {{ HTML::script('js/scripts.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/dropzone.js') }}

    {{ HTML::style('css/bootstrap.css') }}
    {{ HTML::style('css/basic.css') }}
    {{ HTML::style('css/styles.css') }}
    {{ HTML::style('css/font-awesome.css') }}

  
    
    <link href='http://fonts.googleapis.com/css?family=Lobster|Candal' rel='stylesheet' type='text/css'>
    
    <style>
    @section('styles')
    body {
        padding-top: 60px;
    }
    @show
    </style>
    </head>

    <body>
    <!-- Navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    </button>

    <a href="{{{ URL::to('') }}}" class="navbar-brand" id="title-logo">Panda Sub</a>
    </div>

    <div class="collapse navbar-collapse">
    <ul class="nav navbar-nav">
    @if (Auth::guest())
    <li>{{ HTML::link('login', 'CONNEXION') }}</li>
    <li>{{ HTML::link('register', 'INSCRIPTION') }}</li>


    @else 
    <li>{{ HTML::link('profile', 'Editer Profil') }}</li> 
    <li>{{ HTML::link('message', 'Messages') }}</li> 
    <li>{{ HTML::link('sortie/create', 'Poster une sortie') }}</li> 
    <li>{{ HTML::link('screenshot/create', 'Ajouter un screenshot') }}</li> 
    
    <li>{{ HTML::link('admin', 'Administration') }}</li>
    <li>{{ HTML::link('logout', 'Se déconnecter') }}</li>
    </ul>
    </div>
    @endif

    
    </div>
    </div>
    </div> 

    <div class="container">

    <!-- Tous les messages d'informations/errors/success -->
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif


    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif

    @if ($message = Session::get('info'))
    <div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{{ $message }}}
    </div>

    @endif

    @yield('content')

    </div>

    <!-- Scripts -->
    {{ HTML::script('js/bootstrap.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}



    </body>
    </html>