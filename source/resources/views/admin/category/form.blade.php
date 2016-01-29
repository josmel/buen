
@extends('admin._layouts.layout')
@section('content')
<div class="container_form">@if(isset($dataCategory->id))
  <h2>Editar categoria</h2>@else
  <h2>Registrar categoria</h2>@endif
  @if($errors->any())
  <ul class="alert">@foreach($errors->all() as $error)
    <li>{{$error}}</li>@endforeach
  </ul>@endif
  {!! Form::model($dataCategory,['files' => true, 'data-parsley-validate'=>'']) !!}
  {!! Form::hidden('id',$dataCategory->id ) !!}
  <fieldset>
    {!! Form::label('name_category', 'Nombre de la categoria') !!}
    {!! Form::text('name_category', null, ['placeholder'=>'Nombre', 'class'=>'validate', 'data-parsley-error-message'=>'Debe ponerle un nombre a la categoria','required']) !!}
  </fieldset>
  <fieldset>
    <div id="mainImg">
      <label for="picture">Imagen</label>
      <input type="file" placeholder="Sube una imagen" name="picture" data-url-img="{{ $dataCategory->picture }}" class="validate js-fileinput js-main-img"/>
    </div>
  </fieldset>
  <fieldset>{!! Form::button('Guardar', ['type'=>'submit', 'class'=>'btn']) !!}</fieldset>{!! Form::close() !!}
</div>@stop