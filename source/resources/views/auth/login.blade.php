
@extends('layout.layout')
@section('content')
<div class="bg_body_login">
  <div class="hack_space"></div>
  <div class="box_login">
    <div class="form_login">
      <h1>Buen Dato</h1><img src="static/img/logo_buen_dato.png"/>
    </div>
    <div class="load">cargando ...</div>
    <div class="message"></div>
    <div class="alert"><strong>Whoops! Hubo algunos problemas con su inicio de sesión.</strong>
      <ul>
        <li></li>
      </ul>
    </div>
    <form data-parsley-validate="data-parsley-validate" class="login show">
      <fieldset>
        <input type="email" parsley-type="email" name="email" placeholder="Email" required="required" data-parsley-error-message="Escribe un mail válido" class="email"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" class="token"/>
      </fieldset>
      <fieldset>
        <input name="password" type="password" placeholder="Contraseña" required="required" class="pass"/>
      </fieldset>
      <fieldset>
        <button type="button" class="btn_login button_orange">Ingresar</button>
      </fieldset><a href="javascript:;">¿No recuerdas tu password?</a>
    </form>
    <form id="resetPassword" data-parsley-validate="data-parsley-validate" class="recover">
      <fieldset>
        <input type="email" name="email" placeholder="Email" required="required" data-parsley-error-message="Escribe un mail válido" class="reco_email"/>
      </fieldset>
      <fieldset>
        <button type="button" class="button_orange">Recuperar password</button>
      </fieldset><a href="javascript:;">Volver</a>
    </form>
  </div>
</div>@endsection