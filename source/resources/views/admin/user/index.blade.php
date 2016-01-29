
@extends('admin._layouts.layout')
@section('content')
<div class="container-page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>Usuarios</h2>
      <div class="box_right">
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="category" data-url="/admpanel/user/list" data-cols="name,lastname,picture,idfacebook,email,flagactive,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">Nombre</td>
            <td>Apellido</td>
            <td>Imagen</td>
            <td>Facebook ID</td>
            <td>Correo</td>
            <td>Estado</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop