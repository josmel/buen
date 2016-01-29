
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(isset($dataPost->id))
  <h2>Editar Publicación</h2>@else
  <h2>Registrar Administrador</h2>@endif
  @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
  {!! Form::model($dataPost,['files' => true, 'autocomplete'=>'on', 'data-parsley-validate'=>'']) !!}
  {!! Form::hidden('id',$dataPost->id ) !!}
  <?php   if($dataPost->pr_provider_id!=0){?>
  {!! Form::hidden('pr_provider_id',$dataPost->pr_provider_id ) !!}
  <?php } ?>
  <?php  if(isset($modulo)){    ?>
  {!! Form::hidden('modulo',$modulo ) !!}
  <?php } ?>
  <fieldset>
    <div id="mainImg">
      <label for="picture">Imagen</label>
      <input type="file" data-url-img="{{ $dataPost->picture }}" class="validate js-fileinput js-main-img"/>
    </div>
  </fieldset>
  <fieldset>
    <div class="input-field">
      {!! Form::label('Descripción',null,['for'=>'description']) !!}
      {!! Form::textarea('description', null , ['class'=>'validate input-field', 'autocomplete'=>'off', 'required','id'=>'description']) !!}
    </div>
  </fieldset>
  <fieldset class="date_open">
    {!! Form::label('date_publish', 'Fecha de Inicio') !!}
    {!! Form::text('date_publish', null, ['placeholder'=>'Fecha de Inicio', 'class'=>'from js-datepicker', 'data-range'=>'from', 'data-parsley-error-message'=>'Debe ponerle una fecha de publicacion','']) !!}
  </fieldset>
  <fieldset class="date_open _right">
    {!! Form::label('date_expired', 'Fecha de Final') !!}
    {!! Form::text('date_expired', null, ['placeholder'=>'Fecha de Final', 'class'=>'to js-datepicker', 'data-range'=>'to', 'data-parsley-error-message'=>'Debe ponerle una fecha de expiracion','']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('pu_category_id', 'Categoría') !!}
    {!! Form::select('pu_category_id', $listCategories, null, ['class' => '', 'id' => 'name_category']) !!}
  </fieldset>
  <fieldset>
    {!! Form::label('pu_type_id', 'Tipo') !!}
    {!! Form::select('pu_type_id', $listTypes, null, ['class' => '', 'id' => 'name_type', 'readonly']) !!}
  </fieldset>
  <fieldset>
    <div class="input-field">
      {!! Form::checkbox('flagactive', $dataPost->flagactive, null, ['class' => 'validate c1234', 'readonly', 'id' => 'flagactive']) !!}
      {!! Form::label('flagactive', 'Estado',['for'=>'flagactive']) !!}
    </div>
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn waves-effect waves-light']) !!}</fieldset>{!! Form::close() !!}
</div>
<script type="text/template" id="tplImgInput">
  <fieldset>
    <label for="picture">Imagen</label>
    <input type="file" placeholder="Sube una imagen" multiple="multiple" class="validate js-fileinput"/>
  </fieldset>
</script>@stop