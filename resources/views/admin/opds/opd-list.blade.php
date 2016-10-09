@extends('layouts.master-admin')
@section('title', 'Lista de Universidades')
@section('description', 'Lista de Universidade del Gobierno del Estado de Puebla')
@section('bodyclass', 'opds')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'opds')

@section('content')
<div class="row">
<!-- Universidades -->
	<div class="col-sm-12">
		<h1>Universidades</h1>
	</div>
	<div class="col-sm-12">
	@if($opds->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-4">Universidad</span>
	  	  	<span class="col-sm-3">Ubicación</span>
	  	  	<span class="col-sm-3">Contacto</span>
	  	  	<span class="col-sm-2">Acciones</span>
	  	</li>
	  @foreach($opds as $opd)
	    <li class="row">
	    	<span class="col-sm-4"><a href="{{url("dashboard/opd/{$opd->id}")}}" class="link_view"> {{$opd->opd->id}}</a><br>
	    	{{$opd->email}}<br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($opd->updated_at))}}</span></span>
			<span class="col-sm-3">{{$opd->opd->city}}, {{$opd->opd->state}}</span>
			<span class="col-sm-3">{!!$opd->opd->has('contact') ? $opd->opd->contact->name  . '<br>' : '' !!} 
			{!!$opd->opd->has('contact') ? $opd->opd->contact->email . '<br>' : ''!!}
			{{ $opd->opd->has('contact') ? $opd->opd->contact->phone : '' }} </span>
			<span class="col-sm-2">
				<a href="{{url("dashboard/opd/editar/{$opd->id}")}}" class="btn xs">Editar</a>
						<a href="{{url("dashboard/opd/eliminar/{$opd->id}")}}" class="btn danger xs">Eliminar</a>
			</span>
	    </li>
	  @endforeach
	  </ul>
	
	@else
		<p>No hay universidades</p>
	@endif
	
	
	{{ $opds->links() }}
	</div>
</div>
@endsection