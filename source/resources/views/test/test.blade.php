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
    <link href="static/css/all.css" media="all" rel="stylesheet" type="text/css">
    <link href="static/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <link href="img/logo.png" rel="icon"><!--[if lte IE 9]>
      <script src="static/js/vendor/selectivizr/selectivizr.js"></script>
      <script src="static/js/vendor/html5shiv/dist/html5shiv.js"></script><![endif]-->
  </head>
  <body>
    <!--include _loader.jade-->
    <header>
      <section>
        <h1><a href="index.html" title="Buen Dato"><img src="img/logo.png" atl="Buen Dato"></a></h1>
        <nav class="menu">
          <ul>
            <li><a href="nosotros.html">Nosotros</a>
              <div class="flecha-up"></div>
            </li>
            <li><span>| 		</span></li>
            <li><a href="contactanos.html">Contáctanos</a>
              <div class="flecha-up"></div>
            </li>
          </ul>
        </nav>
        <div class="buttons"><a data-fancybox-type="iframe" href="login.html" data-menu="1" class="btn--big login_popup">Login</a><a data-fancybox-type="iframe" href="registrate.html" class="btn--big popup">Registrate</a></div>
      </section>
    </header>
    <div id="wrapper">
      <div id="section-1__comunity">
        <section>
          <h2>Únete a la comunidad de repartidores</h2>
          <h3>Gana más de S/. X al día con horarios flexibles</h3><a data-fancybox-type="iframe" href="unete.html" class="btn btn--skyblue btn--big popup">Únete</a>
        </section>
      </div>
      <div id="section-2__comunity">
        <section>
          <div class="items-comunity">
            <ul>
              <li>
                <figure class="float-left"><img src="img/item-comunity.png"></figure>
                <blockquote class="float-right">
                  <h3>Item 1</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam eos cupiditate necessitatibus, incidunt nobis unde beatae nam amet sequi ex, nostrum soluta magni.</p>
                </blockquote>
              </li>
              <li>
                <figure class="float-right"><img src="img/item-comunity.png"></figure>
                <blockquote class="float-left">
                  <h3>Item 2</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam eos cupiditate necessitatibus, incidunt nobis unde beatae nam amet sequi ex, nostrum soluta magni.</p>
                </blockquote>
              </li>
              <li>
                <figure class="float-left"><img src="img/item-comunity.png"></figure>
                <blockquote class="float-right">
                  <h3>Item 3</h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam eos cupiditate necessitatibus, incidunt nobis unde beatae nam amet sequi ex, nostrum soluta magni.</p>
                </blockquote>
              </li>
            </ul>
          </div>
        </section>
      </div>
    </div>
    <footer>
      <section>
        <p>soy un footer</p>
      </section>
    </footer>
    <script>
      window.alpha = {
      	module : 'cligo',
      	controller : 'comunity',
      	action: 'index'
      }
    </script>
    <script src="static/js/vendor/jquery/jquery.min.js" type="text/javascript"></script>
    <script data-main="static/js/main" src="static/js/vendor/requirejs/require.js"></script>
  </body>
</html>