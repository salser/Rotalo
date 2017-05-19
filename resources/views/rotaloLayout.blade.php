<!DOCTYPE html>
<!-- Plantilla que se utiliza en todas las interfaces paratener una base en donde se trabajara siempre el frontend -->
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

	<!-- Tab Icon -->
	<link rel="icon" href="{!! 'imgs/rotalo-icono.png' !!}">
	<link rel="apple-touch-icon" href="{!! 'imgs/rotalo-icono.png' !!}">

	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css">

	<!-- JQuery CDN Source -->
	<script type="text/javascript" src="{!! 'https://code.jquery.com/jquery-3.1.1.min.js' !!}"></script>
	<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.js' !!}"></script>

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css' !!}">

	<!-- Compiled and minified JavaScript -->
	<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js' !!}"></script>
	<link href="{!!'https://fonts.googleapis.com/icon?family=Material+Icons' !!}" rel="stylesheet">


	<!-- Own sources -->
	<script src="{!! '/js/rotaloScript.js' !!}"></script>
	<link rel="stylesheet" href="{!! '/styles/rotaloStyle.css' !!}"> @yield('title')

	<!-- Fonts -->
	<link href="{!! 'https://fonts.googleapis.com/css?family=Anton|Baloo|Indie+Flower' !!}" rel="stylesheet">

	<!-- reCaptcha -->
	<script src="{!! 'https://www.google.com/recaptcha/api.js' !!}"></script>

</head>

<body>
	<header>
		<nav>
			<div class="nav-wrapper">
				<a href="/" class="brand-logo"><img src="{!! '/imgs/rotalo-icono.png' !!}" alt=""></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li>
						<nav>
							<div class="nav-wrapper">
								<form class="row" action="/buscar" method="POST">
									<div class="input-field">
										<input placeholder="Buscar en Rótalo" name="buscar" class="validate" id="buscar" type="search" required>
										<label for="buscar"><i style="color: rgba(0, 56, 255, 0.81)" class="material-icons prefix">search</i></label>
										<i class="material-icons">close</i>
									</div>
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
								</form>
							</div>
						</nav>
					</li>
					@if(Auth::check())
					<!-- Dropdown Structure -->
					<ul id="dropdownSesionM" class="dropdown-content">
						<li><a href="/perfil">Perfil</a></li>
						<li><a href="/historialTrueques/{!! Auth::user()->username !!}">Historial de trueques</a></li>
						<li><a href="/misProductos">Mis productos</a></li>

						<li class="divider"></li>
						<li><a href="/cerrar">Cerrar Sesión</a></li>
					</ul>
					<!-- Dropdown Trigger -->
					<li>
						<a class="dropdown-button" data-activates="dropdownSesionM">
									{!! Auth::user()->nombre !!}
									<i class="material-icons right">arrow_drop_down</i>
								</a>
					</li>
					@endif @if(!Auth::check())
					<li><a href="/inicio">Iniciar Sesi&oacuten</a></li>
					@endif

					<ul id="dropdownProductosM" class="dropdown-content">
						<li><a href="/categoriasENproductos/Electrodomesticos">Electrodomésticos</a></li>
						<li><a href="/categoriasENproductos/Vehiculos">Vehículos</a></li>
						<li><a href="/categoriasENproductos/Inmuebles">Inmuebles</a></li>
						<li><a href="/categoriasENproductos/Literatura">Literatura</a></li>
						<li><a href="/categoriasENproductos/Musica">Música</a></li>
						<li><a href="/categoriasENproductos/Arte">Arte</a></li>
						<li><a href="/categoriasENproductos/Tablets-Telefonos">Tablets-Teléfonos</a></li>
						<li><a href="/categoriasENproductos/Computadores">Computadores</a></li>
						<li><a href="/categoriasENproductos/Consolas de Video Juegos">VidéoJuegos</a></li>
					</ul>
					<li>
						<a href="/todosProductos" class="dropdown-button" data-activates="dropdownProductosM">
								Productos en trueque
								<i class="material-icons right">arrow_drop_down</i>
							</a>
					</li>
					<li><a href="/contactanos">Cont&aacutectanos</a></li>
					<li><a href="/rotalo">Rótalo</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li>
						<nav>
							<div class="nav-wrapper">
								<form class="row" action="/buscar" method="POST">
									<div class="input-field">
										<input placeholder="Buscar en Rótalo" class="validate" id="buscar" name="buscar" type="search" required>
										<label for="buscar"><i style="color: rgba(0, 56, 255, 0.81)" class="material-icons prefix">search</i></label>
										<i class="material-icons">close</i>
									</div>
								</form>
							</div>
						</nav>
					</li>
					@if(Auth::check())
					<!-- Dropdown Structure -->
					<ul id="dropdownSesion" class="dropdown-content">
						<li><a href="/perfil">Perfil</a></li>
						<li><a href="/historialTrueques/{!! Auth::user()->username !!}">Historial de trueques</a></li>
						<li><a href="/misProductos">Mis productos</a></li>
						<li class="divider"></li>
						<li><a href="/cerrar">Cerrar Sesión</a></li>
					</ul>
					<!-- Dropdown Trigger -->
					<li>
						<a class="dropdown-button" href="#!" data-activates="dropdownSesion">
									{!! Auth::user()->nombre !!}
									<i class="material-icons right">arrow_drop_down</i>
								</a>
					</li>
					@endif @if(!Auth::check())
					<li><a href="/inicio">Iniciar Sesi&oacuten</a></li>
					@endif
					<ul id="dropdownProductos" class="dropdown-content">
						<li><a href="/categoriasENproductos/Electrodomesticos">Electrodomésticos</a></li>
						<li><a href="/categoriasENproductos/Vehiculos">Vehículos</a></li>
						<li><a href="/categoriasENproductos/Inmuebles">Inmuebles</a></li>
						<li><a href="/categoriasENproductos/Literatura">Literatura</a></li>
						<li><a href="/categoriasENproductos/Musica">Música</a></li>
						<li><a href="/categoriasENproductos/Arte">Arte</a></li>
						<li><a href="/categoriasENproductos/Tablets-Telefonos">Tablets-Teléfonos</a></li>
						<li><a href="/categoriasENproductos/Computadores">Computadores</a></li>
						<li><a href="/categoriasENproductos/VideoJuegos">VideoJuegos</a></li>
					</ul>
					<li>
						<a href="/todosProductos" class="dropdown-button" data-activates="dropdownProductos">
  	          	Productos en trueque
  	          	<i class="material-icons right"> arrow_drop_down</i>
  	          </a>
					</li>
					<li><a href="/contactanos">Cont&aacutectanos</a></li>
					<li><a href="/rotalo">Rótalo</a></li>
					@if (!Auth::check())
					<li><a href="/registro">Registrarse</a></li>
					@endif
				</ul>
			</div>
		</nav>
	</header>
	@yield('content')
	<footer class="page-footer">
		<div class="container">
			<div class="row">
				<div class="col l6 s12">
					<h5 class="white-text">Rótalo</h5>
					<p class="grey-text text-lighten-4">No lo usas, rótalo</p>
				</div>
				<div class="col l4 offset-l2 s12">
					<h5 class="white-text">Site Map</h5>
					<ul>
						@if(!Auth::check())
						<li><a class="grey-text text-lighten-3" href="#!">Iniciar Sesión</a></li>
						@endif
						<li><a class="grey-text text-lighten-3" href="/todosProductos">Productos en trueque</a></li>
						<li><a class="grey-text text-lighten-3" href="/contactanos">Contáctanos</a></li>
						<li><a class="grey-text text-lighten-3" href="/rotalo">Rótalo</a></li>
						@if(Auth::check())
						<li><a class="grey-text text-lighten-3" href="/cerrar">Cerrar sesión.</a></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				© 2017 Todos los derechos reservados CoWorkers
				<a class="grey-text text-lighten-4 right" href="#!">CoWorkers</a>
			</div>
		</div>
	</footer>
	@yield('script')
</body>

</html>
