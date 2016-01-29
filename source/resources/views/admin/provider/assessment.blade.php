
<index>@extends('admin._layouts.layout')</index>@section('content')
<div class="container-page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif 
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>Valoracion de Proveedor {{ ucwords($dataProvider->name_provider)}}</h2>
      <div class="box_right">
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="category" data-url="/admpanel/provider/list-assessment/{{ $dataProvider->id}}" data-cols="name,lastname,picture_user,punctuation,description,picture_comment,flagactive,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">NOMBRE</td>
            <td>Apellido</td>
            <td>Imagen usuario</td>
            <td>Puntuación</td>
            <td>Comentario</td>
            <td>Imagen Comentario</td>
            <td>estado</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop