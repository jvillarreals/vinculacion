@extends('layouts.master-admin')
@section('title', 'Editar mi perfil')
@section('description', 'Editar mi perfil en la plataforma de vinculación del Gobierno del Estado de Puebla')
@section('bodyclass', 'puebla me')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_p', 'me-update')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <!-- Formulario de perfil -->
      <h1>Editar mi perfil</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      {!! Form::model($user, ['url' => 'tablero-secotrade/yo/editar', "class" => "form-horizontal"]) !!}

      <!-- cosas del user -->
      <fieldset>
        <p>
          <label>Nombre</label>
          {{Form::text('name', !empty($user->name) ? $user->name:'',["class" => "form-control"])}}
          @if($errors->has('name'))
          <strong>{{$errors->first('name')}}</strong>
          @endif
        </p>

        <p>
          <label>Correo</label>
          {{Form::text('email', !empty($user->email) ? $user->email : '' ,["class" => "form-control"])}}
          @if($errors->has('email'))
          <strong>{{$errors->first('email')}}</strong>
          @endif
        </p>

        <p>
          <label>Contraseña</label>
          {{Form::password('password',["class" => "form-control"])}}
          @if($errors->has('password'))
          <strong>{{$errors->first('password')}}</strong>
          @endif
        </p>
      </fieldset>




      <p>{{Form::submit('Actualizar', ['class' => "btn"])}}</p>

      <!-- se cierra el form -->
      {!! Form::close() !!}
    </div>

  </div>
</div>
@endsection
