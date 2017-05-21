<!-- Interfaz que extiende el layout de rotalo, y contiene los datos de perfil de un usuario ya autenticado -->
@extends('rotaloLayout')
@section('title')
<title>Perfil {!! Auth::user()->nombre !!}</title>
@endsection
@section('content')
<main>
	<div class="container">
	</div>
		<div class="container">
			<h4>Hola {!! Auth::user()->nombre !!} estos son los datos de tu perfil</h4>
			@if(Session::has('cambio'))
				<div class="row">
					<div class="col s12">
						<div class="col s12 l4 m6">
							<p class="change">{!! Session::get('cambio') !!}</p>
						</div>
					</div>
				</div>
			@endif
			@if(Session::has('noCambio'))
				<div class="row">
					<div class="col s12">
						<div class="col s12 l9 m12">
							<p class="nChange">{!! Session::get('noCambio') !!}</p>
						</div>
					</div>
				</div>
			@endif
			<ul class="collection">
		    <li class="collection-item avatar">
					<a title="Para cambiar foto de perfil haga click sobre la imagen" href="#modalFoto"><img src="{!! Auth::user()->foto !!}" alt="" class="circle cambioFoto"></a>
		      <span class="title">Nombre y Apellido</span>
		      <p>
						{!! Auth::user()->nombre !!} {!! Auth::user()->apellido !!}
		      </p>
		      <a class="secondary-content"><i class="material-icons">grid_off</i></a>
					<!-- Modal Structure -->
					<div id="modalFoto" class="modal">
						<div class="modal-content">
							<h4 class="container">Cambiar Foto</h4>
							<form action="cambiarFoto" method="POST" enctype="multipart/form-data" class="container">
								<img class="imgCambio" src="{!! Auth::user()->foto !!}" alt="">
								<div class="col s12 m12 l12">
				          <label class="archivolbl">Selecciona</label><br>
				          <input type="file" name="cFoto" id="cFoto">
				        </div>
								<br>
								<div class="modal-footer">
									<a style="margin-left: 5px" class="bordeModalbtn modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
									<input class="bordeModalbtn modal-action waves-effect waves-green btn-flat" onclick="" type="submit" name="submit" id="submit" value="Cambiar">
								</div>
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							</form>
						</div>
					</div>
		    </li>
		    <li class="collection-item avatar">
		      <i class="material-icons circle blue">face</i>
		      <span class="title">Nombre de usuario</span>
		      <p>
						{!! Auth::user()->username !!}
		      </p>
		      <a class="secondary-content"><i class="material-icons">grid_off</i></a>
		    </li>
		    <li class="collection-item avatar">
		      <i class="material-icons circle red">mail</i>
		      <span class="title">Correo</span>
		      <p>
						{!! Auth::user()->correo !!}
		      </p>
		      <a class="secondary-content"><i class="material-icons">grid_off</i></a>
		    </li>
				<li class="collection-item avatar">
		      <i class="material-icons circle green">phone</i>
		      <span class="title">Teléfono</span>
		      <p>
						{!! Auth::user()->telefono !!}
		      </p>
		      <a href="#modalTelefono" class="secondary-content"><i class="material-icons">edit</i></a>
					<!-- Modal Structure -->
					<div id="modalTelefono" class="modal">
						<div class="modal-content">
							<h4 class="container">Cambiar #Teléfono</h4>
							<form action="cambiarTelefono" method="POST" enctype="multipart/form-data" class="container">
								<p>Número de teléfono atual: {!! Auth::user()->telefono !!}</p>
								<div class="input-field col s12 m12 l12">
				          <input type="number" name="tel" id="tel">
									<label for="tel">Nuevo Número de teléfono</label><br>
				        </div>
								<br>
								<div class="modal-footer">
									<a style="margin-left: 5px" class="bordeModalbtn modal-action modal-close waves-effect waves-red btn-flat">Cancelar</a>
									<input class="bordeModalbtn modal-action waves-effect waves-green btn-flat" onclick="" type="submit" name="submit" id="submit" value="Cambiar">
								</div>
								<input type="hidden" name="_token" value="{!! csrf_token() !!}">
							</form>
						</div>
					</div>
		    </li>
			<a href="/cerrar">Cerrar sesión.</a>
		</div>
	</main>
@endsection
