@extends('layouts.master-admin')
@section('title', 'Empleo Abierto')
@section('description', 'Empleo Abierto del Gobierno del Estado de Puebla')
@section('bodyclass', 'company')


@section('content')
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>Tablero de compradores</h1>
			</div>
		</div>
		<!--perfil-->
		<div class="row">
			<div class="col-sm-8">
				<div class="box">
					<div class="col-sm-4">
					<img src="{{ url(empty($company->logo) ? 'default.png' : 'img/logos/' . $company->logo) }}">
					</div>
					<div class="col-sm-8">
						<h3>{{$company->nombre_comercial}}</h3>
						<p>{{$user->email}}</p>
						<p><a class="btn edit" href ="{{url('tablero-empresa/yo/editar')}}">Edita tu perfil</a></p>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<!--vacantes-->
		<div class="row">
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Vacantes</h4>
					<h5><span>{{$company->vacancies->count()}}</span></h5>
				</div>
			</div>

			<!--
			<div class="col-sm-4">
				<div class="box">
					<h4>Estudiantes que aplicaron</h4>
					<h5><span>0</span></h5>
				</div>
			</div>
			-->
			<div class="col-sm-4">
				<div class="box">
					<h4>Tus Convenios</h4>
					<h5><span>{{$company->contracts->count()}}</span></h5>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
