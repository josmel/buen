
@extends('admin._layouts.layout')
@section('content')
<div class="container-page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>Publicaciones</h2>
      <div class="box_right">
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="category" data-url="/admpanel/publication/list" data-cols="description,name_provider,name_type,name_category,picture_publication,flagactive,comentarios,likes,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">Descripcion</td>
            <td>Proveedor</td>
            <td>Tipo</td>
            <td>categoría</td>
            <td>Imagen</td>
            <td>Estado</td>
            <td>comentarios</td>
            <td>likes</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop