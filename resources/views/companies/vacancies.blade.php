@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<section>
  <div class="container">
    
    <div class="row">
      <div class="col-sm-12">
        <h1>Vacantes</h1>
      </div>
    </div>

    @if($vacancies->count())
    <ul>
      @foreach($vacancies as $vacancy)
      <li>{{$vacancy->job}}</li>
      @endforeach
    </ul>
    @else
      <p>No tienes ninguna vacante publicada</p>
    @endif

    <p><a href="{{url('tablero-empresa/vacante/crear')}}">Crear una vacante</a></p>

  </div>
</section>
@endsection