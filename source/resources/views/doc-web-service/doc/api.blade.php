<!DOCTYPE HTML><html><head><title>Doc Ws Buendato API documentation</title><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="generator" content="https://github.com/kevinrenskers/raml2html 2.1.2"><link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.1/styles/default.min.css"><script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script><script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.1/highlight.min.js"></script><script type="text/javascript">
      $(document).ready(function() {
        $('.page-header pre code, .top-resource-description pre code').each(function(i, block) {
          hljs.highlightBlock(block);
        });

        $('[data-toggle]').click(function() {
          var selector = $(this).data('target') + ' pre code';
          $(selector).each(function(i, block) {
            hljs.highlightBlock(block);
          });
        });

        // open modal on hashes like #_action_get
        $(window).bind('hashchange', function(e) {
          var anchor_id = document.location.hash.substr(1); //strip #
          var element = $('#' + anchor_id);

          // do we have such element + is it a modal?  --> show it
          if (element.length && element.hasClass('modal')) {
            element.modal('show');
          }
        });

        // execute hashchange on first page load
        $(window).trigger('hashchange');

        // remove url fragment on modal hide
        $('.modal').on('hidden.bs.modal', function() {
          try {
            if (history && history.replaceState) {
                history.replaceState({}, '', '#');
            }
          } catch(e) {}
        });
      });
    </script><style>
      .hljs {
        background: transparent;
      }
      .parent {
        color: #999;
      }
      .list-group-item > .badge {
        float: none;
        margin-right: 6px;
      }
      .panel-title > .methods {
        float: right;
      }
      .badge {
        border-radius: 0;
        text-transform: uppercase;
        width: 70px;
        font-weight: normal;
        color: #f3f3f6;
        line-height: normal;
      }
      .badge_get {
        background-color: #63a8e2;
      }
      .badge_post {
        background-color: #6cbd7d;
      }
      .badge_put {
        background-color: #22bac4;
      }
      .badge_delete {
        background-color: #d26460;
      }
      .badge_patch {
        background-color: #ccc444;
      }
      .list-group, .panel-group {
        margin-bottom: 0;
      }
      .panel-group .panel+.panel-white {
        margin-top: 0;
      }
      .panel-group .panel-white {
        border-bottom: 1px solid #F5F5F5;
        border-radius: 0;
      }
      .panel-white:last-child {
        border-bottom-color: white;
        -webkit-box-shadow: none;
        box-shadow: none;
      }
      .panel-white .panel-heading {
        background: white;
      }
      .tab-pane ul {
        padding-left: 2em;
      }
      .tab-pane h2 {
        font-size: 1.2em;
        padding-bottom: 4px;
        border-bottom: 1px solid #ddd;
      }
      .tab-pane h3 {
        font-size: 1.1em;
      }
      .tab-content {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        padding: 10px;
      }
      #sidebar {
        margin-top: 30px;
        padding-right: 5px;
        overflow: auto;
        height: 90%;
      }
      .top-resource-description {
        border-bottom: 1px solid #ddd;
        background: #fcfcfc;
        padding: 15px 15px 0 15px;
        margin: -15px -15px 10px -15px;
      }
      .resource-description {
        border-bottom: 1px solid #fcfcfc;
        background: #fcfcfc;
        padding: 15px 15px 0 15px;
        margin: -15px -15px 10px -15px;
      }
      .resource-description p:last-child {
        margin: 0;
      }
      .list-group .badge {
        float: left;
      }
      .method_description {
        margin-left: 85px;
      }
      .method_description p:last-child {
        margin: 0;
      }
      .list-group-item {
        cursor: pointer;
      }
      .list-group-item:hover {
        background-color: #f5f5f5;
      }
    </style></head><body data-spy="scroll" data-target="#sidebar"><div class="container"><div class="row"><div class="col-md-9" role="main"><div class="page-header"><h1>Doc Ws Buendato API documentation <small>version v1</small></h1><p>http://dev-buendato.osp.pe/wservice</p><h3 id="Sobre-los-servicios"><a href="#Sobre-los-servicios">Sobre los servicios</a></h3><p>En este documento se encuentra todo los servicios web relacionados al proyecto "Buendato" en el dominio <a href="http://dev-buendato.osp.pe/wservice">http://dev-buendato.osp.pe/wservice</a> seguido de la url del servicio</p></div><div class="panel panel-default"><div class="panel-heading"><h3 id="register" class="panel-title">Registrar Usuario</h3></div><div class="panel-body"><div class="top-resource-description"><p>Registrar Usuario</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_register"><span class="parent"></span>/register</a> <span class="methods"><a href="#register_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_register" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#register_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Registrar Usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="register_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent"></span>/register</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Usuario</p></div><ul class="nav nav-tabs"><li class="active"><a href="#register_post_request" data-toggle="tab">Request</a></li><li><a href="#register_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="register_post_request"><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register user",
  "properties": 
    {                    
        "email": { "type": "string" },
        "idfacebook": { "type": "string" },
        "picture": { "type": "string" },
        "name": { "type": "string"},
        "lastname": { "type": "string"}
    },
  "required": [ "email", "idfacebook","name","lastname"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
  "email":"user@osp.pe",
  "idfacebook":"1234567894551122"
  "picture":"https://facebook.com/15456456454?size=small",
  "name":"josmel",
  "lastname":"yupanqui",
  }
</code></pre></div><div class="tab-pane" id="register_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "OK",
  "data": [ 
             {
               "id":"1"
             } 
          ],
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="login" class="panel-title">Login del usuario</h3></div><div class="panel-body"><div class="top-resource-description"><p>Login del usuario</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_login"><span class="parent"></span>/login</a> <span class="methods"><a href="#login_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_login" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#login_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Login del usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="login_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent"></span>/login</h4></div><div class="modal-body"><div class="alert alert-info"><p>Login del usuario</p></div><ul class="nav nav-tabs"><li class="active"><a href="#login_post_request" data-toggle="tab">Request</a></li><li><a href="#login_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="login_post_request"><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "Login",
  "properties": 
    {                    
        "email": { "type": "string" },
        "idfacebook": { "type": "string" },
        "tokendevice": { "type": "string" },
        "typedevice": { "type": "integer", "value": "1=Ios or 2=Android"}
    },
  "required": [ "email", "idfacebook","tokendevice","typedevice" ]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "email":"jy@osp.pe",
    "idfacebook":123456789123,
    "tokendevice":"458478748748545489748749874874897487498484984",
    "typedevice":2
}
</code></pre></div><div class="tab-pane" id="login_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Headers</h3><ul><li><strong>_token</strong>: <em>(string)</em><p>token para los posteriores request</p><p><strong>Example</strong>:</p><pre>45847874874ewfewfewf854548974nyntyntyn8749874874897487498484984</pre></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "12",
            "name": "jos",
            "lastname": "yupanqui",
            "email": "jy@osp.pe",
            "tokendevice": "31234243145253",
            "picture": "http://10.10.0.67/dinamic/user/20151214194024245.jpg",
            "flagactive": "1",
            "lastupdate": "2016-01-07 19:34:17",
            "datecreate": "2015-12-14 19:40:24",
            "datedelete": null,
            "typedevice": "1",
            "flagterms": "1",
            "categories": [
                {
                    "id": "1",
                    "picture": "http://10.10.0.67/ssss",
                    "name_category": "mantenimiento"
                },
                {
                    "id": "4",
                    "picture": null,
                    "name_category": "educación"
                },
                {
                    "id": "6",
                    "picture": null,
                    "name_category": "comida"
                }
            ]
        }
    ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="logout" class="panel-title">Logout del usuario</h3></div><div class="panel-body"><div class="top-resource-description"><p>cancelar la sesión de usuario y borrar token de dispositivo</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_logout"><span class="parent"></span>/logout</a> <span class="methods"><a href="#logout_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_logout" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#logout_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Logout del usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="logout_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/logout</h4></div><div class="modal-body"><div class="alert alert-info"><p>Logout del usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#logout_post_request" data-toggle="tab">Request</a></li><li><a href="#logout_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="logout_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul></div><div class="tab-pane" id="logout_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "OK",
  "data": [  ],
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="user" class="panel-title">Usuario</h3></div><div class="panel-body"><div class="top-resource-description"><p>Servicio de datos de Usuario</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_user"><span class="parent"></span>/user</a> <span class="methods"><a href="#user_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_user" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#user_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Retorna datos del usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="user_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/user</h4></div><div class="modal-body"><div class="alert alert-info"><p>Retorna datos del usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#user_get_request" data-toggle="tab">Request</a></li><li><a href="#user_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="user_get_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul></div><div class="tab-pane" id="user_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": [
      {
          "id": "12",
          "name": "jos",
          "lastname": "yupanqui",
          "email": "jy@osp.pe",
          "tokendevice": "31234243145253",
          "picture": "http://10.10.0.67/dinamic/user/20151214194024245.jpg",
          "flagactive": "1",
          "lastupdate": "2016-01-07 19:34:17",
          "datecreate": "2015-12-14 19:40:24",
          "datedelete": null,
          "typedevice": "1",
          "flagterms": "1",
          "categories": [
              {
                  "id": "1",
                  "picture": "http://10.10.0.67/ssss",
                  "name_category": "mantenimiento"
              },
              {
                  "id": "4",
                  "picture": null,
                  "name_category": "educación"
              },
              {
                  "id": "6",
                  "picture": null,
                  "name_category": "comida"
              }
          ]
      }
  ],
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_user__user_id_"><span class="parent">/user</span>/{user_id}</a> <span class="methods"><a href="#user__user_id__put"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_user__user_id_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>Detalle de categoria</p></div><div class="list-group"><div onclick="window.location.href = '#user__user_id__put'" class="list-group-item"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>actualizar datos de usuario ,asi como término(flagterms a 1)</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="user__user_id__put"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/user</span>/{user_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>actualizar datos de usuario ,asi como término(flagterms a 1)</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#user__user_id__put_request" data-toggle="tab">Request</a></li><li><a href="#user__user_id__put_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="user__user_id__put_request"><h3>URI Parameters</h3><ul><li><strong>user_id</strong>: <em>required (integer)</em><p>id de usuario</p><p><strong>Example</strong>:</p><pre><code>1</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
    "type": "object",
    "description": "register user",
    "properties": 
      {                    
          "picture": { "type": "string" },
          "name": { "type": "string"},
          "lastname": { "type": "string"},
          "flagterms": { "type": "integer","value":"0:inactivo, 1=activo"}
      },
    "required": []
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "flagterms":1
    "picture":"https://facebook.com/15456456454?size=small",
    "name":"josmel",
    "lastname":"yupanqui",
}
</code></pre></div><div class="tab-pane" id="user__user_id__put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
              {
                "id":1
              }
            ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="categories" class="panel-title">Categorias</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_categories"><span class="parent"></span>/categories</a> <span class="methods"><a href="#categories_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#categories_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_categories" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#categories_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar categoria de Usuario</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#categories_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Lista de todas las categorias</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="categories_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/categories</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar categoria de Usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#categories_post_request" data-toggle="tab">Request</a></li><li><a href="#categories_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="categories_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register category for user",
  "properties": 
    {                    
        "categories_id": { "type": "string"}
    },
  "required": [ "categories_id" ]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "categories_id":"1-2-3-4"
}
</code></pre></div><div class="tab-pane" id="categories_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": [],
  "data_error": []
}
</code></pre></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="categories_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/categories</h4></div><div class="modal-body"><div class="alert alert-info"><p>Lista de todas las categorias</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#categories_get_request" data-toggle="tab">Request</a></li><li><a href="#categories_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="categories_get_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul></div><div class="tab-pane" id="categories_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
      "status": 1,
      "msg": "ok",
      "data": [
          {
              "id": "1",
              "name_category": "mantenimiento",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": "http://local.buendato//dinamic/user/20151218154743297.jpg"
          },
          {
              "id": "2",
              "name_category": "deporte",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": null
          },
          {
              "id": "3",
              "name_category": "salud",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": null
          },
          {
              "id": "4",
              "name_category": "educación",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": null
          },
          {
              "id": "5",
              "name_category": "vivienda",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": null
          },
          {
              "id": "6",
              "name_category": "comida",
              "lastupdate": "2015-12-14 19:40:24",
              "datecreate": "2015-12-14 19:40:24",
              "flagactive": "1",
              "picture": null
          }
      ],
      "data_error": []
 }
</code></pre></div></div></div></div></div></div></div><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_categories__user_id_"><span class="parent">/categories</span>/{user_id}</a> <span class="methods"><a href="#categories__user_id__put"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_categories__user_id_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>Detalle de categoria</p></div><div class="list-group"><div onclick="window.location.href = '#categories__user_id__put'" class="list-group-item"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>actualizar categorias de usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="categories__user_id__put"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_put">put <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/categories</span>/{user_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>actualizar categorias de usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#categories__user_id__put_request" data-toggle="tab">Request</a></li><li><a href="#categories__user_id__put_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="categories__user_id__put_request"><h3>URI Parameters</h3><ul><li><strong>user_id</strong>: <em>required (integer)</em><p>id de usuario</p><p><strong>Example</strong>:</p><pre><code>2</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "update category for user",
  "properties": 
    {                    
        "categories_id": { "type": "string"}
    },
  "required": [ "categories_id" ]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "categories_id":"1-2-3-4"
}
</code></pre></div><div class="tab-pane" id="categories__user_id__put_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_categories__category_id_"><span class="parent">/categories</span>/{category_id}</a> <span class="methods"><a href="#categories__category_id__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_categories__category_id_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>Detalle de categoria</p></div><div class="list-group"><div onclick="window.location.href = '#categories__category_id__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Detalle de categoria</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="categories__category_id__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/categories</span>/{category_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Detalle de categoria</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#categories__category_id__get_request" data-toggle="tab">Request</a></li><li><a href="#categories__category_id__get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="categories__category_id__get_request"><h3>URI Parameters</h3><ul><li><strong>category_id</strong>: <em>required (integer)</em><p>id de categoria</p><p><strong>Example</strong>:</p><pre><code>2</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul></div><div class="tab-pane" id="categories__category_id__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": {
        "id": "1",
        "name_category": "mantenimiento",
        "lastupdate": "2015-12-14 19:40:24",
        "datecreate": "2015-12-14 19:40:24",
        "flagactive": "1",
        "picture": "http://local.buendato/dinamic/user/20151218154743297.jpg"
    },
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="providers" class="panel-title">Proveedores</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_providers"><span class="parent"></span>/providers</a> <span class="methods"><a href="#providers_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#providers_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_providers" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#providers_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar Proveedor</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#providers_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Lista de todos los proveedores paginados o filtrados por categoria</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="providers_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/providers</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Proveedor</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#providers_post_request" data-toggle="tab">Request</a></li><li><a href="#providers_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="providers_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register proveedor",
  "properties": 
    {                    
        "description": { "type": "string"},
        "pu_category_id": { "type": "integer"},
        "name_provider": { "type": "string"},
        "email": { "type": "string"},
        "phone": { "type": "string"},
        "website": { "type": "string"}
    },
  "required": [ "description" ,"pu_category_id","name_provider","email","phone"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{                    
    "description": "new providers",
    "pu_category_id":1,
    "name_provider": "josmel",
    "email":"provider@osp.pe",
    "phone": "78787878",
    "website":"http://osp.pe",
 }
</code></pre></div><div class="tab-pane" id="providers_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": {
      "id": 6
  },
  "data_error": []
}
</code></pre></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="providers_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/providers</h4></div><div class="modal-body"><div class="alert alert-info"><p>Lista de todos los proveedores paginados o filtrados por categoria</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#providers_get_request" data-toggle="tab">Request</a></li><li><a href="#providers_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="providers_get_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Query Parameters</h3><ul><li><strong>page</strong>: <em>(number)</em><p>El numero de pagina para el paginado</p></li><li><strong>pu_category_id</strong>: <em>(number)</em><p>id de categoria si se desea filtrar por categoria</p></li><li><strong>name_provider</strong>: <em>(string)</em><p>nombre de proveedor si se desea filtrar por nombre de proveedor con minimo 3 caracteres</p></li></ul></div><div class="tab-pane" id="providers_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "1",
            "pu_category_id": "4",
            "user_id": null,
            "pr_type_id": "3",
            "name_provider": "peres",
            "reason_social": "S.A.C",
            "type_document": "1",
            "number_document": "54545454",
            "phone": "986547890",
            "website": "http://myface.com",
            "email": "abc@osp.pe",
            "address": null,
            "coordenate": null,
            "ranking": "1.50",
            "picture_face": "http://local.buendato//dinamic/category/20160120073123736.png",
            "lastupdate": "2016-01-26 23:55:19",
            "datecreate": null,
            "flagactive": "1",
            "picture_category": "http://local.buendato//dinamic/category/20160120073123736.png",
            "name_type": "premium",
            "name_category": "salud",
            "total_users": "5",
            "friends": [
                {
                    "idfacebook": "10156644988105647"
                },
                {
                    "idfacebook": "620320758106445"
                },
                {
                    "idfacebook": "10153512513095805"
                },
                {
                    "idfacebook": "10156576400725089"
                }
            ],
            "picture_provider": [
                {
                    "flagactive": "1",
                    "datecreate": null,
                    "picture": "http://local.buendato//dinamic/category/20160120073123736.png"
                },
                {
                    "flagactive": "1",
                    "datecreate": null,
                    "picture": "http://local.buendato//dinamic/category/20160120073123736.png"
                },
                {
                    "flagactive": "1",
                    "datecreate": null,
                    "picture": "http://local.buendato//dinamic/category/20160120073123736.png"
                }
            ]
        },
        {
            "id": "5",
            "pu_category_id": "2",
            "user_id": null,
            "pr_type_id": "2",
            "name_provider": "pedro picapiedra",
            "reason_social": null,
            "type_document": null,
            "number_document": null,
            "phone": "eeee",
            "website": null,
            "email": "email@osp.pe",
            "address": null,
            "coordenate": null,
            "ranking": "5.00",
            "picture_face": null,
            "lastupdate": "2016-01-22 22:49:12",
            "datecreate": "2015-12-28 20:16:25",
            "flagactive": "1",
            "picture_category": "http://local.buendato//dinamic/category/20160120073113822.png",
            "name_type": "comun",
            "name_category": "deporte",
            "total_users": "5",
            "friends": [
                {
                    "idfacebook": "10156644988105647"
                },
                {
                    "idfacebook": "620320758106445"
                },
                {
                    "idfacebook": "10153512513095805"
                },
                {
                    "idfacebook": "10156576400725089"
                }
            ],
            "picture_provider": []
        },
        {
            "id": "2",
            "pu_category_id": "1",
            "user_id": null,
            "pr_type_id": "2",
            "name_provider": "zidane",
            "reason_social": "zisu",
            "type_document": "3",
            "number_document": null,
            "phone": "112345567",
            "website": "www.zzz.com",
            "email": "zisu@gmail.com",
            "address": null,
            "coordenate": null,
            "ranking": "3.00",
            "picture_face": "http://local.buendato//dinamic/provider/20160121033023475.jpg",
            "lastupdate": "2016-01-21 15:30:23",
            "datecreate": null,
            "flagactive": "1",
            "picture_category": "http://local.buendato//dinamic/category/20160120073113822.png",
            "name_type": "comun",
            "name_category": "deporte",
            "total_users": "5",
            "friends": [
                {
                    "idfacebook": "10156644988105647"
                },
                {
                    "idfacebook": "620320758106445"
                },
                {
                    "idfacebook": "10153512513095805"
                },
                {
                    "idfacebook": "10156576400725089"
                }
            ],
            "picture_provider": []
        }
    ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_providers__provider_id_"><span class="parent">/providers</span>/{provider_id}</a> <span class="methods"><a href="#providers__provider_id__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_providers__provider_id_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>Detalle de proveedor</p></div><div class="list-group"><div onclick="window.location.href = '#providers__provider_id__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Detalle de valoraciones de proveedor</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="providers__provider_id__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/providers</span>/{provider_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Detalle de valoraciones de proveedor</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#providers__provider_id__get_request" data-toggle="tab">Request</a></li><li><a href="#providers__provider_id__get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="providers__provider_id__get_request"><h3>URI Parameters</h3><ul><li><strong>provider_id</strong>: <em>required (integer)</em><p>id de proveedor</p><p><strong>Example</strong>:</p><pre><code>1</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Query Parameters</h3><ul><li><strong>page</strong>: <em>required (number)</em><p>El numero de pagina</p></li></ul></div><div class="tab-pane" id="providers__provider_id__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "7",
            "user_id": "14",
            "pr_provider_id": "1",
            "description": "perefectao servicio",
            "punctuation": "5",
            "flagactive": "1",
            "picture": "dede/ddd.jpg",
            "datecreate": null,
            "lastupdate": null,
            "picture_user": "http://10.10.0.67//dinamic/user/20151218154743297.jpg",
            "picture_comment": "http://10.10.0.67/dede/ddd.jpg",
            "name_user": "noel yupanqui"
        },
        {
            "id": "8",
            "user_id": "12",
            "pr_provider_id": "1",
            "description": "hola que tal",
            "punctuation": "4",
            "flagactive": "1",
            "picture": "dede/ddd.jpg",
            "datecreate": null,
            "lastupdate": null,
            "picture_user": "http://10.10.0.67//dinamic/user/20151214194024245.jpg",
            "picture_comment": "http://10.10.0.67/dede/ddd.jpg",
            "name_user": "jos yupanqui"
        }
    ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="publication" class="panel-title">Publicaciones</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_publication"><span class="parent"></span>/publication</a> <span class="methods"><a href="#publication_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#publication_get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_publication" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#publication_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar Publicacion</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#publication_get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Lista de todas las publicaciones paginadas las cuales se pueden filtradas por categoria o usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="publication_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/publication</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Publicacion</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#publication_post_request" data-toggle="tab">Request</a></li><li><a href="#publication_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="publication_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register publication",
  "properties": 
    {                    
        "description": { "type": "string"},
        "pu_category_id": { "type": "integer"},
        "pr_provider_id": { "type": "integer"},
        "picture": { "type": "string"}
    },
  "required": [ "description" ,"pu_category_id"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{                    
    "description": "Alguien me puede recomendar una masajista?",
    "pu_category_id":1,
    "picture":"iVBORw0KGgoAAAANSUhEUgAAADsAAAApCAYAAACLO1EjAAAAAXNSR0IArs4c6QAA
                AAlwSFlzAAAWJQAAFiUBSVIk8AAAABxpRE9UAAAAAgAAAAAAAAAVAAAAKAAAABUA
                AAAUAAAHlWThBZQAAAdhSURBVGgFjFjLruJGEOXnsshmpEiRssln8DnZzSqJFI2U"
 }
</code></pre></div><div class="tab-pane" id="publication_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": {
      "id": 6
  },
  "data_error": []
}
</code></pre></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="publication_get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/publication</h4></div><div class="modal-body"><div class="alert alert-info"><p>Lista de todas las publicaciones paginadas las cuales se pueden filtradas por categoria o usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#publication_get_request" data-toggle="tab">Request</a></li><li><a href="#publication_get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="publication_get_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Query Parameters</h3><ul><li><strong>page</strong>: <em>(number)</em><p>El numero de pagina para el paginado</p></li><li><strong>categories_id</strong>: <em>(string)</em><p>lista de categoria separado por "-" si se desea filtrar por categoria . Ejem"[1-2-3]</p></li><li><strong>user_id</strong>: <em>(number)</em><p>id de usuario si se desea filtrar por usuario</p></li><li><strong>description</strong>: <em>(string)</em><p>busqueda por descripcion de publicacion con un minimo de 3 caracteres</p></li></ul></div><div class="tab-pane" id="publication_get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "3",
            "idfacebook": 12421413434134,
            "pu_type_id": "3",
            "pu_category_id": "4",
            "pu_state_id": "1",
            "user_id": "14",
            "description": "Tras ello, la mujer fue detenida y pasó la noche en la comisaría de Chorrillos. Dadas las evidencias, la mujer le puede seguir los pasos ",
            "date_publish": "2015-12-21 20:09:52",
            "date_expired": "2015-12-21 20:09:52",
            "flagactive": "1",
            "datecreate": "2015-12-21 20:09:52",
            "lastupdate": "2016-01-26 17:22:18",
            "picture_publication": "http://local.buendato//dinamic/publication/20160121082308319.jpg",
            "picture_user": "http://local.buendato//dinamic/user/20151218154743297.jpg",
            "picture_category": "http://local.buendato//dinamic/category/20160120073113822.png",
            "name_user": "noel yupanqui",
            "name_category": "deporte",
            "name_type": "premium",
            "likes": "0",
            "comments": "2",
            "provider": [
                {
                    "pr_provider_id": "1",
                    "id_type_provider": "3",
                    "name_provider": "peres",
                    "name_type_provider": "premium",
                    "approved": "1",
                    "total_users": "0",
                    "score": "1.50",
                    "picture_provider": "http://local.buendato/Array",
                    "name_category": "educación",
                    "picture_category": "http://local.buendato//dinamic/category/20160120073133296.png"
                }
            ]
        },
        {
            "id": "2",
            "idfacebook": 12321421421421,
            "pu_type_id": "2",
            "pu_category_id": null,
            "pu_state_id": "1",
            "user_id": "14",
            "description": "Alguien me puede recomendar una masajista?",
            "date_publish": "0000-00-00 00:00:00",
            "date_expired": "0000-00-00 00:00:00",
            "flagactive": "1",
            "datecreate": "2015-12-21 20:07:24",
            "lastupdate": "2016-01-22 20:17:28",
            "picture_publication": "http://local.buendato//dinamic/publication/20160122031949781.png",
            "picture_user": "http://local.buendato//dinamic/user/20151218154743297.jpg",
            "picture_category": "http://local.buendato//dinamic/category/20160120073123736.png",
            "name_user": "noel yupanqui",
            "name_category": "salud",
            "name_type": "popular",
            "likes": "1",
            "comments": "1",
            "provider": []
        },
        {
            "id": "7",
            "idfacebook": 123213213421321,
            "pu_type_id": "2",
            "pu_category_id": null,
            "pu_state_id": "1",
            "user_id": "14",
            "description": "Alguien me puede recomendar una masajista?",
            "date_publish": "2015-12-21 20:22:34",
            "date_expired": "2015-12-21 20:22:34",
            "flagactive": "1",
            "datecreate": "2015-12-21 20:22:34",
            "lastupdate": "2016-01-21 16:53:06",
            "picture_publication": "http://local.buendato//dinamic/publication/20160121081026801.png",
            "picture_user": "http://local.buendato//dinamic/user/20151218154743297.jpg",
            "picture_category": "http://local.buendato//dinamic/category/2016012007310311.png",
            "name_user": "noel yupanqui",
            "name_category": "mantenimiento",
            "name_type": "popular",
            "likes": "0",
            "comments": "1",
            "provider": []
        },
        {
            "id": "9",
            "idfacebook": 131312321321321,
            "pu_type_id": "2",
            "pu_category_id": null,
            "pu_state_id": "1",
            "user_id": "14",
            "description": "Alguien me puede recomendar una masajista?",
            "date_publish": "2015-12-21 20:26:10",
            "date_expired": "2015-12-21 20:26:10",
            "flagactive": "1",
            "datecreate": "2015-12-21 20:26:10",
            "lastupdate": "2015-12-21 20:26:10",
            "picture_publication": "http://local.buendato//dinamic/publication/20151221202610665.jpg",
            "picture_user": "http://local.buendato//dinamic/user/20151218154743297.jpg",
            "picture_category": "http://local.buendato//dinamic/category/2016012007310311.png",
            "name_user": "noel yupanqui",
            "name_category": "mantenimiento",
            "name_type": "popular",
            "likes": "0",
            "comments": "4",
            "provider": []
        },
        {
            "id": "30",
            "idfacebook": 115454564545645,
            "pu_type_id": "1",
            "pu_category_id": "4",
            "pu_state_id": "1",
            "user_id": "14",
            "description": "Donde recomiendan un buen profesor de mate",
            "date_publish": "2016-01-26 22:34:40",
            "date_expired": "2016-01-26 22:34:40",
            "flagactive": "1",
            "datecreate": "2016-01-26 22:34:40",
            "lastupdate": "2016-01-26 22:34:40",
            "picture_publication": null,
            "picture_user": "http://local.buendato//dinamic/user/20151218154743297.jpg",
            "picture_category": "http://local.buendato//dinamic/category/20160120073113822.png",
            "name_user": "noel yupanqui",
            "name_category": "deporte",
            "name_type": "comun",
            "likes": "0",
            "comments": "0",
            "provider": [
                {
                    "pr_provider_id": "1",
                    "id_type_provider": "3",
                    "name_provider": "peres",
                    "name_type_provider": "premium",
                    "approved": "1",
                    "total_users": "0",
                    "score": "1.50",
                    "picture_provider": "http://local.buendato/Array",
                    "name_category": "educación",
                    "picture_category": "http://local.buendato//dinamic/category/20160120073133296.png"
                }
            ]
        }
    ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_publication__publication_id_"><span class="parent">/publication</span>/{publication_id}</a> <span class="methods"><a href="#publication__publication_id__get"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a> <a href="#publication__publication_id__delete"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_publication__publication_id_" class="panel-collapse collapse"><div class="panel-body"><div class="resource-description"><p>Detalle de proveedor</p></div><div class="list-group"><div onclick="window.location.href = '#publication__publication_id__get'" class="list-group-item"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Lista de Comentarios paginado de Publicación</p></div><div class="clearfix"></div></div><div onclick="window.location.href = '#publication__publication_id__delete'" class="list-group-item"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Eliminar propia publicacion o denunciar publicacion de otro usuario</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="publication__publication_id__get"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_get">get <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/publication</span>/{publication_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Lista de Comentarios paginado de Publicación</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#publication__publication_id__get_request" data-toggle="tab">Request</a></li><li><a href="#publication__publication_id__get_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="publication__publication_id__get_request"><h3>URI Parameters</h3><ul><li><strong>publication_id</strong>: <em>required (integer)</em><p>id de publicacion</p><p><strong>Example</strong>:</p><pre><code>1</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Query Parameters</h3><ul><li><strong>page</strong>: <em>required (number)</em><p>El numero de pagina</p></li></ul></div><div class="tab-pane" id="publication__publication_id__get_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Lista en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "1",
            "pu_ad_id": "1",
            "user_id": "12",
            "description": "dedededed",
            "picture": null,
            "lastupdate": null,
            "datecreate": "-0001-11-30 00:00:00",
            "flagactive": "1",
            "picture_user": "http://10.10.0.67//dinamic/user/20151214194024245.jpg",
            "name_user": "jos yupanqui",
            "provider": [
                {
                    "pr_provider_id": "1",
                    "name_provider": "josmel",
                    "id_type_provider": "2",
                    "name_type_provider": "comun",
                    "approved": "1",
                    "total_users": "0",
                    "score": "1.50",
                    "picture_provider": "http://10.10.0.67/20151214194024245.jpg"
                }
            ]
        },
        {
            "id": "2",
            "pu_ad_id": "1",
            "user_id": "13",
            "description": "e3e3e3",
            "picture": null,
            "lastupdate": null,
            "datecreate": null,
            "flagactive": "1",
            "picture_user": "http://10.10.0.67/20151214194024245.jpg",
            "name_user": "admin admin",
            "provider": []
        }
    ],
    "data_error": []
}
</code></pre></div></div></div></div></div></div><div class="modal fade" tabindex="0" id="publication__publication_id__delete"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_delete">delete <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent">/publication</span>/{publication_id}</h4></div><div class="modal-body"><div class="alert alert-info"><p>Eliminar propia publicacion o denunciar publicacion de otro usuario</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#publication__publication_id__delete_request" data-toggle="tab">Request</a></li><li><a href="#publication__publication_id__delete_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="publication__publication_id__delete_request"><h3>URI Parameters</h3><ul><li><strong>publication_id</strong>: <em>required (integer)</em><p>id de publicacion</p><p><strong>Example</strong>:</p><pre><code>1</code></pre></li></ul><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul></div><div class="tab-pane" id="publication__publication_id__delete_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [],
    "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="like_publication" class="panel-title">Like de Publicacion</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_like_publication"><span class="parent"></span>/like-publication</a> <span class="methods"><a href="#like_publication_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_like_publication" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#like_publication_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar Like de una Publicación</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="like_publication_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/like-publication</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Like de una Publicación</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#like_publication_post_request" data-toggle="tab">Request</a></li><li><a href="#like_publication_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="like_publication_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register Like de  publication",
  "properties": 
    {                    
        "pu_ad_id": { "type": "integer"}
    },
  "required": [ "pu_ad_id"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "pu_ad_id":2
}
</code></pre></div><div class="tab-pane" id="like_publication_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": {
      "id": 6
  },
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="comment_publication" class="panel-title">Comentario de Publicacion</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_comment_publication"><span class="parent"></span>/comment-publication</a> <span class="methods"><a href="#comment_publication_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_comment_publication" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#comment_publication_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar Comentario de una Publicación</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="comment_publication_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/comment-publication</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Comentario de una Publicación</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#comment_publication_post_request" data-toggle="tab">Request</a></li><li><a href="#comment_publication_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="comment_publication_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register Comentario de una publication",
  "properties": 
    {     
        "description": { "type": "string"},              
        "pu_ad_id": { "type": "integer"},
        "picture": { "type": "string"},
        "pr_provider_id":{ "type": "integer"}
    },
  "required": [ "pu_ad_id","description"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "description":"hola les recomiendo este proveedor",
    "pu_ad_id":5,
    "picture":"iVBORw0KGgoAAAANSUhEUgAAADsAAAApCAYAAACLO1EjAAAAAXNSR0IArs4c6QAA
    AAlwSFlzAAAWJQAAFiUBSVIk8AAAABxpRE9UAAAAAgAAAAAAAAAVAAAAKAAAABUA
    AAAUAAAHlWThBZQAAAdhSURBVGgFjFjLruJGEOXnsshmpEiRssln8DnZzSqJFI2U
    RaRZZaQoo0wy9zHcFy9jwIBt8JM3+FI5p6AvBgx3LPWYa7e761SdOlU9JbfblHMj
    "
}
</code></pre></div><div class="tab-pane" id="comment_publication_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": {
      "id": 6
  },
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="comment_provider" class="panel-title">Comentario y valoración de Proveedor</h3></div><div class="panel-body"><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_comment_provider"><span class="parent"></span>/comment-provider</a> <span class="methods"><a href="#comment_provider_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_comment_provider" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#comment_provider_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Registrar Comentario y valoración de una Proveedor</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="comment_provider_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/comment-provider</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registrar Comentario y valoración de una Proveedor</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#comment_provider_post_request" data-toggle="tab">Request</a></li><li><a href="#comment_provider_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="comment_provider_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "register Comentario y valoración de una publication",
  "properties": 
    {     
        "description": { "type": "string"},              
        "punctuation": { "type": "integer"},
        "picture": { "type": "string"},
        "pr_provider_id":{ "type": "integer"}
    },
  "required": [ "pr_provider_id","description","punctuation"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "pr_provider_id":6,
    "description":"Muy Buen servicio",
    "punctuation":5,
    "picture":"iVBORw0KGgoAAAANSUhEUgAAADsAAAApCAYAAACLO1EjAAAAAXNSR0IArs4c6QAA
    AAlwSFlzAAAWJQAAFiUBSVIk8AAAABxpRE9UAAAAAgAAAAAAAAAVAAAAKAAAABUA
    AAAUAAAHlWThBZQAAAdhSURBVGgFjFjLruJGEOXnsshmpEiRssln8DnZzSqJFI2U
    RaRZZaQoo0wy9zHcFy9jwIBt8JM3+FI5p6AvBgx3LPWYa7e761SdOlU9JbfblHMj"
}
</code></pre></div><div class="tab-pane" id="comment_provider_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>Resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "ok",
  "data": {
      "id": 6
  },
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="register_friends" class="panel-title">permite agregar amigos de facebooks</h3></div><div class="panel-body"><div class="top-resource-description"><p>permite agregar amigos de facebook</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_register_friends"><span class="parent"></span>/register-friends</a> <span class="methods"><a href="#register_friends_post"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span></a></span></h4></div><div id="panel_register_friends" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#register_friends_post'" class="list-group-item"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span><div class="method_description"><p>Permite agregar amigos de facebook</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="register_friends_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post <span class="glyphicon glyphicon-lock" title="Authentication required"></span></span> <span class="parent"></span>/register-friends</h4></div><div class="modal-body"><div class="alert alert-info"><p>Permite agregar amigos de facebook</p></div><div class="alert alert-warning"><span class="glyphicon glyphicon-lock" title="Authentication required"></span> Secured by jwt</div><ul class="nav nav-tabs"><li class="active"><a href="#register_friends_post_request" data-toggle="tab">Request</a></li><li><a href="#register_friends_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="register_friends_post_request"><h3>Headers</h3><ul><li><strong>Authorization</strong>: <em>(string)</em><p>Se utiliza para enviar un token válido . No utilice con el parámetro de cadena de consulta</p></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": "Permite agregar amigos de facebook",
  "properties": 
    {     
        "data_friends": { "type": "string"}
    },
  "required": [ "data_friends"]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "data_friends":"{\n    \"data\": [\n        {\n            \"id\": \"AaLDkxqmoHVy_kur3QH_GcoqeXnNT3Yq7CrRyJ_R63FnCnxSoNv3sFnjgdahqugge0fwczpRPwhHY79_K1em8D3pnMWCuNOTr6jCkPe6lWYXBg\",\n            \"name\": \"Hector Floyd\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-xpa1\/v\/t1.0-1\/c8.0.50.50\/p50x50\/63950_10203949139743751_5232762622187423091_n.jpg?oh=e8b9e4b8b43752141a0e24d69b95b9e1&amp;oe=57288C5C&amp;__gda__=1463986843_7adddb6927a3ad59a89dda22d5231f18\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaIEK-QhH6fnMpp9oNq-C6pHPpP1MwkM04Qf6yLbxmtl1XkT-j0gr6xHz1xVWyKYKTbenW6fs5BXrQMGYjrY1WVji0wLjQLWiw5UimFTQLTKgw\",\n            \"name\": \"Eduardo Jos\u00e9 Medina Alfaro\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-xpt1\/v\/t1.0-1\/p50x50\/12079424_10205004434176814_7088424199927341812_n.jpg?oh=868f35d3d580091b89b421b278e3753d&amp;oe=5731F1CB&amp;__gda__=1462179510_61995d2d0b1d703a44e929a9558c5411\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaIAXWFKL-GwN5MCOM87d0xTvGRD7ZjKoaD_weaC4geKSmo-scJogzKgbF_a8RRYyIrhGcDYojIfBS40QpJhfCTQ11cKAWvmQ-cnDIqeYwYRsg\",\n            \"name\": \"Louis Lopez Huamani\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-xtf1\/v\/t1.0-1\/p50x50\/10665809_963150913711212_5999610143046387492_n.jpg?oh=a991b5b3e7e9d2a706c7cb2f1a0e190a&amp;oe=57374A13&amp;__gda__=1463764053_cab966ad168b912e8458a19915acc39e\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaJsdDy13ldGKarG_AAYu8ZTHZtZLN4jTHkhHtRlflFfBi4qA1RXF3ru1yCtP7Fa99r36snPm4bGRG-Gw38RqYibyB-PjObv6iEDtIifFNilHw\",\n            \"name\": \"Jesus Castro Escalante\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-frc3\/v\/t1.0-1\/p50x50\/10940521_1010849642276308_1846786750439191117_n.jpg?oh=19951893326f27634fdb48fdc907b588&amp;oe=572A94FE&amp;__gda__=1462465132_3958da5fea407f8bc9b66bf7947bdd49\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaIIFuMCLzpN5fpHLGBNcNQdsRmL8mHApaPMgFJCL0ZYMRCR8doqvY8Y5CXPM-o4F1iSgsQ7hOkrB1bJTptUaeK3mDbv7CpL9LzzhYlvnJIEBw\",\n            \"name\": \"Sergio G Dellepiane Espinoza\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-xpt1\/v\/t1.0-1\/p50x50\/1916738_502867333217773_8997795212138245018_n.jpg?oh=67c3b1b43db3776359c7cb1402828ab1&amp;oe=5745C6D8&amp;__gda__=1463172229_3e45e914224b5f74b661f4829b47ee9d\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaLBlJine0P2prRndq8V-gDSHumzqZyMIhnIHnhLpJJfyEieXJKzpPP0XyvTtA-eVJCBVpRWNID-BMSzONmHTSOWt41vUB6FoYsCp7uy8qHttg\",\n            \"name\": \"Gianfranco Espinoza\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": true,\n                    \"url\": \"https:\/\/fbcdn-profile-a.akamaihd.net\/hprofile-ak-xfa1\/v\/t1.0-1\/c15.0.50.50\/p50x50\/10354686_10150004552801856_220367501106153455_n.jpg?oh=31a919a3d795bc64ad02d0a1b462300e&amp;oe=5736B82F&amp;__gda__=1463225095_484ea4441f278e6b8895ab53a1be91a0\"\n                }\n            }\n        },\n        {\n            \"id\": \"AaLqnPtutzf3cDjUmnf_Mu4H5E_dWlvhkSaT6u88WgC2qaR6yWwFXqIoyYYy_fGJzSi__fZg3UdE7jc0MgAObUkFaBhl7iAgOSDGXSg11KVdUg\",\n            \"name\": \"Jesus Prueba\",\n            \"picture\": {\n                \"data\": {\n                    \"is_silhouette\": false,\n                    \"url\": \"https:\/\/scontent.xx.fbcdn.net\/hprofile-xta1\/v\/l\/t1.0-1\/p50x50\/10171005_1388029278173645_745442906058184357_n.jpg?oh=28a59b5a9404282d9e95f47b8c72986e&amp;oe=5738FBE1\"\n                }\n            }\n        }\n    ],\n    \"paging\": {\n        \"cursors\": {\n            \"before\": \"QWFJbzE5cmtScFNGUmRDLTlpVWd6elVRc3hyX1ljT1lVYlpLaXBqZAFVpOWdwbVR0WEZAXZADhGX2RySTJsbDNtV0NuLUxWdUlWWlJPT2drMFBiemxBMUt3TVpGUENRQ2U0OHhHNkdscUJ1aXN5WEEZD\",\n            \"after\": \"QWFKcW9KLW1oRWlDZAlpOUkk1Mm9NckNmM3ozaEtpRjV0azgyRjFrMGJBV3p3OVV0dG9YYk9keTA3SHhoQ2tqM2lWTXlzbjlrcmNkN3lKY2JRenlDMVFLS2dLUGUwQUtyRTl6RGVCM2Q5U2M0ZAlEZD\"\n        }\n    }\n}"
}
</code></pre></div><div class="tab-pane" id="register_friends_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><p>resultado en formato JSon</p><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
  "status": 1,
  "msg": "OK",
  "data": [  ],
  "data_error": []
}
</code></pre></div></div></div></div></div></div></div></div></div></div><div class="panel panel-default"><div class="panel-heading"><h3 id="register_alternative" class="panel-title">Registro y login de usuario alternativo</h3></div><div class="panel-body"><div class="top-resource-description"><p>Registro y login de usuario alternativo</p></div><div class="panel-group"><div class="panel panel-white"><div class="panel-heading"><h4 class="panel-title"><a class="collapsed" data-toggle="collapse" href="#panel_register_alternative"><span class="parent"></span>/register-alternative</a> <span class="methods"><a href="#register_alternative_post"><span class="badge badge_post">post</span></a></span></h4></div><div id="panel_register_alternative" class="panel-collapse collapse"><div class="panel-body"><div class="list-group"><div onclick="window.location.href = '#register_alternative_post'" class="list-group-item"><span class="badge badge_post">post</span><div class="method_description"><p>Registro y login de usuario alternativo</p></div><div class="clearfix"></div></div></div></div></div><div class="modal fade" tabindex="0" id="register_alternative_post"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel"><span class="badge badge_post">post</span> <span class="parent"></span>/register-alternative</h4></div><div class="modal-body"><div class="alert alert-info"><p>Registro y login de usuario alternativo</p></div><ul class="nav nav-tabs"><li class="active"><a href="#register_alternative_post_request" data-toggle="tab">Request</a></li><li><a href="#register_alternative_post_response" data-toggle="tab">Response</a></li></ul><div class="tab-content"><div class="tab-pane active" id="register_alternative_post_request"><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Schema</strong>:</p><pre><code>{ 
  "type": "object",
  "description": " Registro y login de usuario alternativo",
  "properties": 
    {                    
        "email": { "type": "string" },
        "idfacebook": { "type": "string" },
        "tokendevice": { "type": "string" },
        "typedevice": { "type": "integer", "value": "1=Ios or 2=Android"},
        "picture": { "type": "string" },
        "name": { "type": "string"},
        "lastname": { "type": "string"}
    },
  "required": [ "email", "idfacebook","tokendevice","typedevice","email","name","lastname" ]
}
</code></pre><p><strong>Example</strong>:</p><pre><code>{
    "idfacebook":123456,
    "name":"josmel",
    "lastname":"yupanqui",
    "picture":"https://facebook.com/15456456454?size=small",
    "typedevice":2 ,
    "tokendevice":"458478748748545489748749874874897487498484984",
    "email":"jy2@osp.pe"
}
</code></pre></div><div class="tab-pane" id="register_alternative_post_response"><h2>HTTP status code <a href="http://httpstatus.es/200" target="_blank">200</a></h2><h3>Headers</h3><ul><li><strong>_token</strong>: <em>(string)</em><p>token para los posteriores request</p><p><strong>Example</strong>:</p><pre>45847874874ewfewfewf854548974nyntyntyn8749874874897487498484984</pre></li></ul><h3>Body</h3><p><strong>Type: application/json</strong></p><p><strong>Example</strong>:</p><pre><code>{
    "status": 1,
    "msg": "ok",
    "data": [
        {
            "id": "12",
            "name": "jos",
            "lastname": "yupanqui",
            "email": "jy@osp.pe",
            "tokendevice": "31234243145253",
            "picture": "http://10.10.0.67/dinamic/user/20151214194024245.jpg",
            "flagactive": "1",
            "lastupdate": "2016-01-07 19:34:17",
            "datecreate": "2015-12-14 19:40:24",
            "datedelete": null,
            "typedevice": "1",
            "flagterms": "1",
            "categories": [
                {
                    "id": "1",
                    "picture": "http://10.10.0.67/ssss",
                    "name_category": "mantenimiento"
                },
                {
                    "id": "4",
                    "picture": null,
                    "name_category": "educación"
                },
                {
                    "id": "6",
                    "picture": null,
                    "name_category": "comida"
                }
            ]
        }
    ],
    "data_error": []
}</code></pre></div></div></div></div></div></div></div></div></div></div></div><div class="col-md-3"><div id="sidebar" class="hidden-print affix" role="complementary"><ul class="nav nav-pills nav-stacked"><li><a href="#register">Registrar Usuario</a></li><li><a href="#login">Login del usuario</a></li><li><a href="#logout">Logout del usuario</a></li><li><a href="#user">Usuario</a></li><li><a href="#categories">Categorias</a></li><li><a href="#providers">Proveedores</a></li><li><a href="#publication">Publicaciones</a></li><li><a href="#like_publication">Like de Publicacion</a></li><li><a href="#comment_publication">Comentario de Publicacion</a></li><li><a href="#comment_provider">Comentario y valoración de Proveedor</a></li><li><a href="#register_friends">permite agregar amigos de facebooks</a></li><li><a href="#register_alternative">Registro y login de usuario alternativo</a></li></ul></div></div></div></div></body></html>