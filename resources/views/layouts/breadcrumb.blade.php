<div class="container">
	<div class="row">
		<div class="col-sm-12 breadcrumb">
			<ul>
				<li><a href="{{ url('dashboard')}}"><i class="material-icons">home</i> 
				</a></li>
				@if ($__env->yieldContent('breadcrumb_a') == 'user')
				<li>Usuarios Administradores</li>
				@endif
				@if ($__env->yieldContent('breadcrumb_a') == 'user create')
				<li><a href="{{ url('dashboard/administradores')}}">Usuarios Administradores
				</a></li>
				<li>Crear Usuario</li>
				@endif								
			</ul>
		</div>
	</div>
</div>