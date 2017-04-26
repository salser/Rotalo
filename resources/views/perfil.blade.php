<!-- Interfaz que extiende el layout de rotalo, y contiene los datos de perfil de un usuario ya autenticado -->
@extends('rotaloLayout')

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
		      <img src="{!! Auth::user()->foto !!}" alt="" class="circle">
		      <span class="title">Nombre y Apellido</span>
		      <p>
						{!! Auth::user()->nombre !!} {!! Auth::user()->apellido !!}
		      </p>
		      <a href="#modalFoto" class="secondary-content"><i class="material-icons">grade</i></a>
					<!-- Modal Structure -->
					<div id="modalFoto" class="modal">
						<div class="modal-content">
							<h4>Cambiar Foto</h4>
							<form action="cambiarFoto" method="POST" enctype="multipart/form-data" class="container">
								<div class="col s12 m12 l12">
				          <label class="archivolbl">Selecciona</label><br>
				          <input type="file" name="cFoto" id="cFoto">
				        </div>
								<br>
								<div class="modal-footer">
									<input class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="" type="submit" name="submit" id="submit" value="Cambiar">
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
		      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
		    </li>
		    <li class="collection-item avatar">
		      <i class="material-icons circle red">mail</i>
		      <span class="title">Correo</span>
		      <p>
						{!! Auth::user()->correo !!}
		      </p>
		      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
		    </li>
				<li class="collection-item avatar">
		      <i class="material-icons circle green">phone</i>
		      <span class="title">Teléfono</span>
		      <p>
						{!! Auth::user()->telefono !!}
		      </p>
		      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
		    </li>
			<a href="/cerrar">Cerrar sesión.</a>
		</div>
	</main>
@endsection
