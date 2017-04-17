<!DOCTYPE html>
<html>
	<head>
				<meta charset="utf-8">

				<!-- JQuery CDN Source -->
				<script type="text/javascript" src="{!! 'https://code.jquery.com/jquery-3.1.1.min.js' !!}"></script>
				<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.js' !!}"></script>

				<!-- Compiled and minified CSS -->
				<link rel="stylesheet" href="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css' !!}">

				<!-- Compiled and minified JavaScript -->
				<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js' !!}"></script>
				<link href="{!!'https://fonts.googleapis.com/icon?family=Material+Icons' !!}" rel="stylesheet">

				<!-- Own sources -->
				<script src="{!! 'js/rotaloScript.js' !!}"></script>
				<link rel="stylesheet" href="{!! 'styles/rotaloStyle.css' !!}">


				<title>R&oacutetalo</title>
	</head>
	<body>
		<header>
			<nav>
			 	<div class="nav-wrapper">
				 	<a href="/" class="brand-logo"><img src="{!! 'imgs/rotalo-icono.png' !!}" alt=""></a>
				 	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
				 	<ul class="right hide-on-med-and-down">
						@if(Auth::check())
							<!-- Dropdown Structure -->
							<ul id="dropdownSesionM" class="dropdown-content">
							<li><a href="/perfil">Perfil</a></li>
							<li><a href="">Historial de trueques</a></li>
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
						@endif
						@if(!Auth::check())
					 		<li><a href="/inicio">Iniciar Sesi&oacuten</a></li>
						@endif

						<ul id="dropdownProductosM" class="dropdown-content">
							<ul id="hobbiesM" class="dropdown-content indd">
								<li><a href="">Literatura</a></li>
								<li><a href="">Música</a></li>
								<li><a href="">Arte</a></li>
							</ul>
							<li>
								<a class="dropdown-button" data-activates="hobbiesM">
									Hobbies
									<i class="material-icons right">arrow_drop_down</i>
								</a>
							</li>
							<ul id="tecnoM" class="dropdown-content indd">
								<li><a href="">Tablets</a></li>
								<li><a href="">Telefonos</a></li>
								<li><a href="">Computadores</a></li>
								<li><a href="">Otros</a></li>
							</ul>

							<li>
								<a class="dropdown-button" data-activates="tecnoM">
									Tecnología
									<i class="material-icons right">arrow_drop_down</i>
								</a>
							</li>
							<li><a href="">Electrodomesticos</a></li>
							<li><a href="">Vehiculos</a></li>
							<li><a href="!#">Inmuebles</a></li>
							<li><a href="!#">VideoJuegos</a></li>
						</ul>
						<li>
							<a class="dropdown-button" data-activates="dropdownProductosM">
								Productos en trueque
								<i class="material-icons right">arrow_drop_down</i>
							</a>
						</li>
					 	<li><a href="#!">Cont&aacutectanos</a></li>
					 	<li><a href="#!">Rótalo</a></li>
				 	</ul>
				 	<ul class="side-nav" id="mobile-demo">
						@if(Auth::check())
							<!-- Dropdown Structure -->
							<ul id="dropdownSesion" class="dropdown-content">
							<li><a href="/perfil">Perfil</a></li>
							<li><a href="">Historial de trueques</a></li>
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
						@endif
						@if(!Auth::check())
							<li><a href="/inicio">Iniciar Sesi&oacuten</a></li>
						@endif
						<ul id="dropdownProductosM" class="dropdown-content">
							<ul id="hobbies" class="dropdown-content indd">
								<li><a href="">Literatura</a></li>
								<li><a href="">Música</a></li>
								<li><a href="">Arte</a></li>
							</ul>
							<li>
								<a class="dropdown-button" data-activates="hobbies">
									Hobbies
									<i class="material-icons right">arrow_drop_down</i>
								</a>
							</li>
							<ul id="tecnoM" class="dropdown-content indd">
								<li><a href="">Tablets</a></li>
								<li><a href="">Telefonos</a></li>
								<li><a href="">Computadores</a></li>
								<li><a href="">Otros</a></li>
							</ul>

							<li>
								<a class="dropdown-button" data-activates="tecno">
									Tecnología
									<i class="material-icons right">arrow_drop_down</i>
								</a>
							</li>
							<li><a href="">Electrodomesticos</a></li>
							<li><a href="">Vehiculos</a></li>
							<li><a href="!#">Inmuebles</a></li>
							<li><a href="!#">VideoJuegos</a></li>
						</ul>
					 	<li><a href="#!">Cont&aacutectanos</a></li>
					 	<li><a href="#!">Rótalo</a></li>
						<li><a href="#!">Registrarse</a></li>
				 	</ul>
				 </div>
			 </nav>
		 </header>
		<main>
			@yield('content')
	 	</main>
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
		            <li><a class="grey-text text-lighten-3" href="#!">Productos en trueque</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Contáctanos</a></li>
		            <li><a class="grey-text text-lighten-3" href="#!">Rótalo</a></li>
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
	</body>
</html>
