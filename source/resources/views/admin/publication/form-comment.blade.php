
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(isset($dataPostComments->id))
  <h2>Editar Comentario</h2>@else
  <h2>Registrar Comentario</h2>@endif
  @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
  {!! Form::model($dataPostComments,['files' => true, 'autocomplete'=>'on', 'data-parsley-validate'=>'']) !!}
  {!! Form::hidden('id',$dataPostComments->id ) !!}
  <?php   if($dataPostComments->pr_provider_id!=0){?>
  {!! Form::hidden('pr_provider_id',$dataPostComments->pr_provider_id ) !!}
  <?php } ?>
  <?php  if(isset($modulo)){    ?>
  {!! Form::hidden('modulo',$modulo ) !!}
  <?php } ?>
  <fieldset>
    <div class="input-field">
      {!! Form::textarea('description', null , ['class'=>'validate', 'autocomplete'=>'off', 'required','id'=>'description']) !!}
      {!! Form::label('Descripción',null,['for'=>'description']) !!}
    </div>
  </fieldset>
  <fieldset>
    {!! Form::label('picture', 'Imagen de Commentario') !!}
    {!! Form::file('picture', null, ['placeholder'=>'Sube una imgen','class'=>'validate js-main-img js-fileinput', 'data-parsley-error-message'=>'Debe adjuntar un icono a la categoria','required']) !!}
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn waves-effect waves-light']) !!}</fieldset>{!! Form::close() !!}
</div>@stop