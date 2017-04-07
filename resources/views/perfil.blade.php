@extends('rotaloLayout')

@section('content')
<div class="container">
</div>
		<div class="container">
			<h4>Hola {!! Auth::user()->nombre !!} estos son los datos de tu perfil</h4>
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
				          <label class="archivolbl">Foto de perfil</label><br>
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
@endsection
