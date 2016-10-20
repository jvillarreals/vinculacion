<header>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
				<h2 class="abierto"><i class="logo"></i>Empleo Abierto</h2>
			</div>
			<div class="col-sm-3 col-sm-offset-5 right">
				<!-- Authentication Links -->
                	<button  class="logout" onclick="location.href='/../logout'">
                	    Cerrar Sesión
                	</button>
                	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                	    {{ csrf_field() }}
                	</form>
			</div>
		</div>
	</div>
</header>
<nav class="main_nav">
	<div class="container">
		<div class="col-sm-12">
			@if ($user->type == 'admin')
			<!-- nav admin-->
				@include('layouts.nav.nav_admin')
			@endif

			@if ($user->type == 'opd')
			<!-- nav universidades-->
				@include('layouts.nav.nav_opd')
			@endif

			@if($user->type == 'company')
			<a href="{{url('tablero-empresa')}}" class="current"><i class="material-icons">home</i> Tablero</a>
			<a href="{{url('tablero-empresa/vacantes')}}"><i class="material-icons">business_center</i> Vacantes</a>
			<a href="{{url('tablero-empresa/yo')}}"><i class="material-icons">domain</i> Perfil</a>
			@endif

			@if ($user->type == 'student')
			<!-- nav estudiantes-->
				@include('layouts.nav.nav_student')
			@endif

		</div>
	</div>
</nav>
