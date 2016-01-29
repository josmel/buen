
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(isset($data->id))
  <h2>Editar Proveedor</h2>@else
  <h2>Registrar Proveedor </h2>@endif
    @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
    {!! Form::model($dataAdmin,['files' => true, 'autocomplete'=>'on', 'data-parsley-validate'=>'']) !!}
    {!! Form::hidden('id',$dataAdmin->id ) !!}
  	<?php  if(isset($modulo)){    ?>
  	{!! Form::hidden('modulo',$modulo ) !!}
  	<?php } ?>
  <fieldset>
    {!! Form::label('Nombre') !!}
    {!! Form::text('name_provider', null , ['placeholder'=>'Nombre', 'class'=>'validate', 'autocomplete'=>'off', 'required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('Razón social', 'Razon_social') !!}
    {!! Form::text('reason_social', null, ['placeholder'=>'Razón social', 'class'=>'validate', 'autocomplete'=>'off', 'required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('phone', 'Teléfono') !!}
    {!! Form::text('phone', null, ['placeholder'=>'Correo', 'class'=>'validate', 'required', 'autocomplete'=>'off']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('email', 'Correo') !!}
    {!! Form::text('email', null, ['placeholder'=>'Correo', 'class'=>'validate', 'required', 'autocomplete'=>'off']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('website', 'Web') !!}
    {!! Form::text('website', null, ['placeholder'=>'Sitio web', 'class'=>'validate', 'required', 'autocomplete'=>'off']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('Tipo', 'Type') !!}
    {!! Form::select('pr_type_id', $listProviders, null, ['class' => '', 'id' => 'name_type']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('Categoría', 'Category') !!}
    {!! Form::select('pu_category_id', $listCategories, null, ['class' => '', 'id' => 'name_category']) !!}
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn']) !!}</fieldset>{!! Form::close() !!}
</div>@stop