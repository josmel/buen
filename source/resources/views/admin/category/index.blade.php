
@extends('admin._layouts.layout')
@section('content')
<div class="container-page">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  <div class="box_center">
    <div class="box_head_contain"></div>
    <div class="content_table">
      <h2>Categoria</h2>
      <div class="box_right"><a href="/admpanel/category/form">Nuevo</a>
        <fieldset>
          <input type="text" placeholder="Buscar" class="search"/><span class="icon icon-search"></span>
        </fieldset>
      </div>
      <div class="clear_both"></div>
      <hr/>
      <table id="category" data-url="/admpanel/category/list" data-cols="name_category,picture,action" class="js-datatable">
        <thead>
          <tr>
            <td class="td_first">Categoria</td>
            <td>Imagen</td>
            <td>Acciones</td>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>@stop