
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(session()->has('messageSuccess'))
  <ul class="alert alert-success">
    <li>{{session('messageSuccess')}}</li>
  </ul>@endif
  @if(isset($dataConfiguration->id))
  <h2>Editar Configuración</h2>@else
  <h2>Registrar Configuración</h2>@endif
  @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
  {!! Form::model($dataConfiguration,['files' => true, 'data-parsley-validate'=>'']) !!}
  {!! Form::hidden('id',$dataConfiguration->id ) !!}
  <fieldset>
    {!! Form::label('limit_buen_dato', 'Limite buen Dato') !!}
    {!! Form::text('limit_buen_dato', null, ['placeholder'=>'Ingrese un valor mayor a 0', 'class'=>'validate', 'data-parsley-error-message'=>'Debe llenar todos los valores','required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('limit_datear', 'Limite Datear') !!}
    {!! Form::text('limit_datear', null, ['placeholder'=>'Ingrese un valor mayor a 0', 'class'=>'validate', 'data-parsley-error-message'=>'Debe llenar todos los valores','required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('limit_friends', 'Limite de Amigos') !!}
    {!! Form::text('limit_friends', null, ['placeholder'=>'Ingrese un valor mayor a 0', 'class'=>'validate', 'data-parsley-error-message'=>'Debe llenar todos los valores','required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('limit_assessment_providers', 'Limite de valoracion de proveedores') !!}
    {!! Form::text('limit_assessment_providers', null, ['placeholder'=>'Ingrese un valor mayor a 0', 'class'=>'validate', 'data-parsley-error-message'=>'Debe llenar todos los valores','required']) !!}
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn']) !!}</fieldset>{!! Form::close() !!}
</div>@stop