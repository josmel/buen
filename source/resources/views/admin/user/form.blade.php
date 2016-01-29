
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(isset($dataUser->id))
  <h2>Editar Usuario App</h2>@else
  <h2>Registrar Usuario App</h2>@endif
  <?php $required = (isset($dataUser->id))? '':'required'; ?>
  @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
  {!! Form::model($dataUser,['files' => true, 'autocomplete'=>'on', 'data-parsley-validate'=>'']) !!}
  {!! Form::hidden('id',$dataUser->id ) !!}
  <fieldset>
    {!! Form::label('nombre') !!}
    {!! Form::text('name', null , ['placeholder'=>'Nombre', 'class'=>'validate', 'autocomplete'=>'off', 'required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('apellidos', 'Apellidos') !!}
    {!! Form::text('lastname', null, ['placeholder'=>'Apellidos', 'class'=>'validate', 'autocomplete'=>'off', 'required']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('email', 'Correo') !!}
    {!! Form::email('email', null, ['placeholder'=>'Correo', 'class'=>'validate', 'required', 'autocomplete'=>'off']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('password', 'Contraseña') !!}
    {!! Form::password('password', array('class' => 'awesome','placeholder'=>$msgform, 'autocomplete'=>'off', $required)) !!}
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn']) !!}</fieldset>{!! Form::close() !!}
</div>@stop