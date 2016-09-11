<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	@if(!empty($title))
    <title>{{  $title }} | Vinculación</title>
    @else
    	@if ($__env->yieldContent('title'))
		<title>@yield('title') | Vinculación</title>
    	@else
    	<title></title>
    	@endif
    @endif
    @if(!empty($description))
    <meta name="description" content="{{  $description }} ">
    @else
    	@if ($__env->yieldContent('description'))
		<meta name="description" content="@yield('description')">
    	@else
		<meta name="description" content="Plataforma Vinculación">
    	@endif
    @endif
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- css--->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>
<body>
	<!--header-->
     @include('header')
	<!--content-->
    @yield('content')

     <!--footer-->
 	 	@include('footer')
</body>
</html>
