<!DOCTYPE html><!--[if IE 7]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie7"></html><![endif]--><!--[if IE 8]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie8"></html><![endif]--><!--[if IE 9]>
<html lang="es" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#" class="ie9"></html><![endif]-->
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="language" content="es">
    <title>Buen Dato</title>
    <meta name="title" content="Buen Dato">
    <meta name="description" content="Administrador de Buen Dato">
    <meta name="author" content="@jeanpaul1304, @ronnycs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="Keywords">
    <meta property="og:description" content="Administrador de Buen Dato">
    <meta property="og:image" content="img/logo.png">
    <meta property="og:site_name" content="OSP">
    <meta property="og:title" content="Buen Dato">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <link href="{{Request::root()}}/static/css/all.css" media="all" rel="stylesheet" type="text/css">
    <link href="{{Request::root()}}/static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="img/logo.png" rel="icon"><!--[if lte IE 9]>
      <script src="{{Request::root()}}/static/js/vendor/selectivizr/selectivizr.js"></script>
      <script src="{{Request::root()}}/static/js/vendor/html5shiv/dist/html5shiv.js"></script><![endif]-->
  </head>
  <body>@yield('content')
    <script>
      window.alpha = {
      	module: 'index',
      	controller: '{{$controller}}',
      	action: '{{$action}}'
      };
    </script>
    <script src="{{Request::root()}}/static/js/vendor/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script data-main="{{Request::root()}}/static/js/main" src="{{Request::root()}}/static/js/vendor/requirejs/require.js"></script>
  </body>
</html>