
@extends('admin._layouts.layout')
@section('content')
<div class="container_page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>ADMIN</h2>
      <div class="box_right"><a href="/admpanel/admin/form">Nuevo</a>
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="admin" data-url="/admpanel/admin/list" data-cols="name,lastname,flagactive,email,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">Nombre</td>
            <td>Apellidos</td>
            <td>estado</td>
            <td>mail</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop