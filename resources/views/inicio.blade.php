@extends('rotaloLayout')

@section('content')
<div class="container">
	<h3>Inicio de Sesión</h3>
</div>
		@if(Session::has('mensaje_error'))
			<p class="container" style="color: red;">{!! Session::get('mensaje_error') !!}</p>
		@endif
		@if(Session::has('registrado'))
			<script>
				mensajeSesion('{!! Session::get('registrado') !!}');
			</script>
		@endif

		<div class="row">
			<form class="col s6 offset-s3" action="inicio" method="POST">
				<div class="row">
					<div class="input-field col s12">
	        	{!! Form::text('usuario', Input::old('username')) !!}
	        	<label for="usuario">Usuario</label>
	      	</div>
					<div class="input-field col s12">
						<input type="password" name="contrasena" id="contrasena">
						<label for="contrasena">Contraseña</label>
					</div>
				</div>
				<input class="btn iniciobtn waves-effect waves-ligth" onclick="" type="submit" name="submit" id="submit" value="Iniciar Sesión">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			</form>
		</div>
@endsection
