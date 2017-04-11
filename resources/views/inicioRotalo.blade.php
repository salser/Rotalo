@extends('rotaloLayout')

@section('content')

		@if(Session::has('mensaje_error'))
			<script>
				mensajeSesion('{!! Session::get('mensaje_error') !!}')
			</script>
		@endif


	<div class="parallax-container">
		<div class="parallax">
			<img class="" src="{!! 'imgs/indice.jpg' !!}">
		</div>
		@if(Auth::check())
			<a href="registro" class="hide-on-med-and-down waves-effect waves-ligth btn transparent" >Registrarse</a>
		@endif
	</div>
	<br><br>
	<div class="container">
		<div class="row center-align">
			<div class="">
				<img class="logoIntro" src="{!! 'imgs/logoRotalo.png' !!}" alt="">
			</div>
		</div>
		<br><br>
		<div class="row">
			<a class="col l4 s12 center-align" style="color: green; font-size: 2.5em;"><i class="material-icons medium">cached</i>Cambia</a>
			<a class="col l4 s12 center-align" style="color: #112293; font-size: 2.5em;"><i class="material-icons medium">announcement</i>Conoce</a>
			<a class="col l4 s12 center-align" style="color: #9c0000; font-size: 2.5em;"><i class="material-icons medium">motorcycle</i>Diviertete</a>
		</div>
		<div class="row">
			<div class="center-align">
				<a style="color: black; font-size: 2.5em;">No lo usas, Rótalo</a>
			</div>
		</div>
	</div>
@endsection
