<!-- Interfaz que extiende el layout de rotalo, y contiene la interfazde inicio del sistema -->
@extends('rotaloLayout')

@section('content')
<main>

		@if(Session::has('mensaje_error'))
			<script>
				mensajeSesion('{!! Session::get('mensaje_error') !!}')
			</script>
		@endif

	<div class="parallax-container">
		<div class="parallax">
			<img class="" src="{!! 'imgs/indice.jpg' !!}">
		</div>
		@if(!Auth::check())
			<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn btnreg" >Registrarse</a>
		@endif
	</div>
	<br><br><br><br>
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="row">
					<a class="col l4 s12" style="color: #112293; font-size: 3em;"><i class="material-icons medium">announcement</i>Conoce</a>
					<a class="col l4 s12" style="color: #9c0000; font-size: 3em;"><i class="material-icons medium">motorcycle</i>Diviertete</a>
					<div class="col l4 s12">
						<img class="responsive-img" src="{!! 'imgs/collagemarcas.jpg' !!}" alt="">
					</div>
				</div>
			</div>
		</div>
		<br><br>

	</div>
		<div class="parallax-container">
			<div class="parallax">
				<img class="" src="{!! 'imgs/indice2.jpg' !!}">
			</div>
		</div>
		<div class="container">
			<br><br>
			<div class="row">
				<div class="col s12 l12 m12">
					<div class="row">
						<div class="col s12 center-align">
							<a style="color: black; font-size: 3em;">No lo usas</a>
						</div>
						<br><br><br><br>
						<div class="col l8 offset-l3 s12" style="">
							<img class="logoIntro responsive-img" src="{!! 'imgs/logoRotalo.png' !!}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection
