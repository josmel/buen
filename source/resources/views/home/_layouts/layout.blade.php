<!DOCTYPE html><!--[if IE 7]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie7"></html><![endif]--><!--[if IE 8]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie8"></html><![endif]--><!--[if IE 9]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie9"></html><![endif]-->
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="language" content="es">
    <title>Reflexiones Religiosas - 
@yield('title')

    </title>
    <meta name="title" content="Reflexiones Religiosas">
    <meta name="description" content="Reflexiones Religiosas's Admin">
    <meta name="author" content="@paulrrdiaz">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Keywords">
    <meta property="og:description" content="Reflexiones Religiosas's Admin">
    <meta property="og:image" content="{{URL::asset('/')}}img/logo.png">
    <meta property="og:site_name" content="Reflexiones Religiosas">
    <meta property="og:title" content="Reflexiones Religiosas">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{URL::asset('/')}}">
    <link href="{{ URL::asset('css/layout/layout.css') }}" media="all" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('js/libs/bootstrap/dist/css/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">
    <link href="{{ URL::asset('img/favicon.ico') }}" rel="icon">
@yield('css')
<!--[if lte IE 9]>
      <link href="{{ URL::asset('css/all/ie.css') }}" media="all" rel="stylesheet" type="text/css">
      <script src="{{ URL::asset('js/libs/selectivizr/selectivizr.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('js/libs/html5shiv/dist/html5shiv.js') }}" type="text/javascript"></script><![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" class="navbar-toggle collapsed"><span class="sr-only">Toggle Navigation</span>
            <spam class="icon-bar"></spam>
            <spam class="icon-bar"></spam>
            <spam class="icon-bar"></spam>
          </button><a href="javascript:;" class="navbar-brand">Laravel</a>
        </div>
        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="{{ route('homeadmin') }}">Home</a></li>
            <li><a href="{{ action('Admin\ReflectionController@getIndex') }}">Reflexiones Lista</a></li>
            <li><a href="{{ action('Admin\ReflectionController@getForm') }}">Reflexiones Formulario</a></li>
            <li><a href="{{ action('Admin\ProfileController@getIndex') }}">Perfil</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
@if(Auth::guest())

@else
              <li class="dropdown"><a href="javascript:;" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">
{{ Auth::user()->name }}
<span class="caret"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li role="menu" class="dropdown-menu"><a href="{{ url('/auth/logout') }}">Logout</a></li>
                </ul>
              </li>

@endif

          </ul>
        </div>
      </div>
    </nav>
    <div class="row">
@yield('content')

    </div>
  </body>
  <script src="{{ URL::asset('js/libs/jquery/dist/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ URL::asset('js/libs/requirejs/require.js') }}" type="text/javascript"></script>
@yield('js')

</html>