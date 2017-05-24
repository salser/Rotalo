<!-- Interfaz que extiende el layout de rotalo, y contiene la interfazde inicio del sistema -->
@extends('rotaloLayout')
@section('title')
<title>Rótalo</title>
@endsection
@section('content')
<main>

		@if(Session::has('mensaje_error'))
			<script>
				mensajeSesion('{!! Session::get('mensaje_error') !!}')
			</script>
		@endif

	<div class="">
		<div class="">
			<iframe style="width: 100%; height: 500px" src="https://youtube.com/embed/g2XscSsGKiY?rel=0&autoplay=1"></iframe>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col s12 l12 m12">
				<div class="row">
					<div class="col s12 center-align">
						<a style="color: black; font-size: 3em;">No lo usas</a>
					</div>
					<br><br>
					<div class=" centralizadoLogo col l8 offset-l3 s12" style="">
						<img class="logoIntro responsive-img" src="{!! 'imgs/logoRotalo.png' !!}" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	@if(!Auth::check())
		<br>
		<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn btnreg" style="margin-left: auto; margin-right: auto; display: block;"><b>Registrarse</b></a>
	@endif
	<div class="row">
		<div class="col nopad s12 m12 l12">
			<div class="row">
				<div class="parallax-container col nopad s12 m12 l12">
					<div class="parallax">
						<img class="" src="{!! 'imgs/indice1.jpg' !!}">
					</div>
					@if(!Auth::check())
						<br>
						<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn btnreg" style="margin-left: auto; margin-right: auto; display: block;"><b>Registrarse</b></a>
					@endif
				</div>
				<div class="parallax-container col nopad s12 m12 l12">
					<div class="parallax">
						<img class="" src="{!! 'imgs/indice2.jpg' !!}">
					</div>
					@if(!Auth::check())
						<br>
						<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn btnreg" style="margin-left: auto; margin-right: auto; display: block;"><b>Registrarse</b></a>
					@endif
				</div>
				<div class="parallax-container col nopad s12 m12 l12" style="margin-bottom: -100px">
					<div class="parallax">
						<img class="" src="{!! 'imgs/indice3.jpg' !!}">
					</div>
					@if(!Auth::check())
						<br>
						<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn btnreg" style="margin-left: auto; margin-right: auto; display: block;"><b>Registrarse</b></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	</main>
@endsection
