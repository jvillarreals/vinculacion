@extends('layouts.master-admin')
@section('title', 'Lista de Empresas')
@section('description', 'Lista de Empresas del Gobierno del Estado de Puebla')
@section('bodyclass', 'empresas')
@section('breadcrumb', 'layouts.breadcrumb')
@section('breadcrumb_a', 'empresas')

@section('content')
<div class="row">
<!-- Empresas -->
	<div class="col-sm-12">
		<h1>Empresas</h1>
	</div>
	<div class="col-sm-12">
	@if($companies->count())
	  <ul class="list">
	  	<li class="row titles">
	  	  	<span class="col-sm-4">Empresa</span>
	  	  	<span class="col-sm-3">Email</span>
	  	  	<span class="col-sm-2">Estado</span>
	  	  	<span class="col-sm-3">Contacto</span>
	  	</li>
	  @foreach($companies as $company)
	    <li class="row">
	    	<span class="col-sm-4"><a href="{{url("dashboard/empresas/{$company->id}")}}"> {{$company->name}}</a><br>
	    	<span class="note">Actualizado: {{date('d-m-Y', strtotime($company->updated_at))}}</span></span>
			<span class="col-sm-3">{{$company->email}}</span>
			<span class="col-sm-2">{{$company->enabled == 0 ? 'Habilitado' : 'Deshabilitado'}}</span>
			<span class="col-sm-3">
				{!! $company->company->company_contact_name ? $company->company->company_contact_name . '<br>' : '' !!}
				{!! $company->company->company_contact_phone ? $company->company->company_contact_phone . '<br>' : '' !!}
				{!! $company->company->company_contact_email ? $company->company->company_contact_email : '' !!}
			</span>
	    </li>
	  @endforeach
	  </ul>
	
	@else
		<p>No hay empresas</p>
	@endif
	
	
	{{ $companies->links() }}
	</div>
</div>
@endsection