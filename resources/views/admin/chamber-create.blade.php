@extends('layouts.master-admin')
@section('content')
<div class="container">
<!-- Formulario de cámara -->
<h4>Crear Cámara</h4>

{!! Form::open(['url' => "dashboard/camara/crear", "class" => "form-horizontal"]) !!}

<!-- cosas del user -->
<fieldset>
<p>
  <label>nombre</label>
  {{Form::text('name')}}
  @if($errors->has('name'))
    <strong>{{$errors->first('name')}}</strong>
  @endif
</p>

<p>
  <label>correo</label>
  {{Form::text('email')}}
  @if($errors->has('email'))
    <strong>{{$errors->first('email')}}</strong>
  @endif
</p>

<p>
  <label>password</label>
  {{Form::password('password')}}
  @if($errors->has('password'))
    <strong>{{$errors->first('password')}}</strong>
  @endif
</p>
</fieldset>

<!-- cosas de su objeto -->
<fieldset>
  <p>
    <label>nombre comercial</label>
    {{Form::text('chamber_comercial_name')}}
    @if($errors->has('chamber_comercial_name'))
      <strong>{{$errors->first('chamber_comercial_name')}}</strong>
    @endif
  </p>

  <p>
    <label>RFC</label>
    {{Form::text('chamber_rfc')}}
    @if($errors->has('chamber_rfc'))
      <strong>{{$errors->first('chamber_rfc')}}</strong>
    @endif
  </p>
</fieldset>

<p>{{Form::submit('Crear')}}</p>

<!-- se cierra el form -->
{!! Form::close() !!}

</div>
@endsection
