
@extends('admin._layouts.layout')
@section('content')
<div class="container-page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>Proveedores en Espera de Confirmación</h2>
      <div class="box_right">
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="category" data-url="/admpanel/provider-waiting/list" data-cols="name_provider,reason_social,phone,picture_face,email,website,name_type,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">NOMBRE</td>
            <td>RAZÓN SOCIAL</td>
            <td>TELÉFONO</td>
            <td>EMAIL</td>
            <td>WEB</td>
            <td>ESTADO</td>
            <td>ACCIÓN</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop