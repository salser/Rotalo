<!-- Interfaz que extiende el layout de rotalo, y contiene el inicio de sesion de un usuario -->
@extends('rotaloLayout')

@section('content')
		@if(Session::has('registrado'))
			<script>
				mensajeSesion('{!! Session::get('registrado') !!}');
			</script>
		@endif

		<main style="background-repeat: round; background-image: linear-gradient(rgba(255,255,255,0.5),rgba(255,255,255,0.5)), url({!! 'imgs/inicioBG.jpg' !!})">
				<div class="row container">
					<div class="col s12 l6 m6 offset-m3 offset-l3">
						<div class="row formas">
							@if(Session::has('mensaje_error'))
							<p class="container" style="color: red;">{!! Session::get('mensaje_error') !!}</p>
							@endif
							<h3 class="col s12">Inicio de Sesión</h3>
							<form class="col s12" action="inicio" method="POST">
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
					</div>
				</div>
		</main>
@endsection
