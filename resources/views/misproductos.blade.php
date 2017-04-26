<!-- Interfaz que extiende el layout de rotalo, y contiene la lista de el usuario autenticado en rotalo-->
@extends('rotaloLayout')

@section('content')
<main>

  <div class="container">
    <h1>Mis Productos</h1>
    @if(Session::has('cambio'))
		<div class="row">
			<div class="col s12">
				<div class="col s12 l3 m6">
					<p class="change">{!! Session::get('cambio') !!}</p>
				</div>
			</div>
		</div>
    @endif
		@if(Session::has('noCambio'))
		<div class="row">
			<div class="col s12">
				<div class="col s12 l4 m6">
					<p class="nChange">{!! Session::get('noCambio') !!}</p>
				</div>
			</div>
		</div>
		@endif
    @if(Session::has('agregarProductos'))
			<div class="row">
				<div class="col s12">
					<div class="col s12 l4 m6">
						<p class="change">{!! Session::get('agregarProductos') !!}</p>
					</div>
				</div>
			</div>
    @endif
		@if(Session::has('nAgregarProductos'))
			<div class="row">
				<div class="col s12">
					<div class="col s12 l4 m6">
						<p class="nChange">{!! Session::get('nAgregarProductos') !!}</p>
					</div>
				</div>
			</div>
	 	@endif
		@if(Session::has('eliminado'))
			<div class="row">
				<div class="col s12">
					<div class="col s12 l4 m6">
						<p class="change">{!! Session::get('eliminado') !!}</p>
					</div>
				</div>
			</div>
		@endif
    <div class="collection">
    @foreach ($productos as $p)
      @if(Auth::user()->id == $p->id_usuario)
        <li href="#!" class="collection-item black-text col s12 m8 l8">
          <div class="">
            <div id="modalEditarProducto{!! $p->id !!}" class="modal">
  						<div class="modal-content">
  							<h4>Editar Producto {!! $p->nombre !!}</h4>
                <br>
                <div class="row">
                  <form action="editarProducto" method="POST" enctype="multipart/form-data" class="container col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input type="text" name="nombreP" value="{!! $p->nombre !!}" id="nombreP">
                        <label for="nombre">Nombre</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input type="text" name="tiempo_uso_a" value="{!! $p->tiempo_uso !!}" id="tiempo_uso_a">
                        <label for="tiempo_uso_a">Tiempo de uso (en años)</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                        <input type="text" name="antiguedad_a" value="{!! $p->antiguedad !!}" id="antiguedad_a">
                        <label for="antiguedad_a">Antigueda (en años)</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                        <textarea name="descripcion_a" id="descripcion_A" rows="8" cols="80" class="materialize-textarea"></textarea>
                        <label for="descripcion_a">Descripción (si no desea cambiarla deje el campo vacio)</label>
                        <p>Descripción actual: {!! $p->descripcion !!}</p>
                      </div>
                      <div class="col s12 m12 l12">
                        <img class="imgCambio" src="{!! $p->foto !!}" alt=""><br>
                        <label class="archivolbl">Selecciona Foto</label><br>
                        <input type="file" name="cFotoP" id="cFotoP">
                      </div>
                      <br>
                      <div class="modal-footer">
                        <input class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="" type="submit" name="submit" id="submit" value="Cambiar">
                      </div>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <input type="hidden" name="id" id="id" value="{!! $p->id !!}">
                    </div>
                  </form>
                </div>
  						</div>
  					</div>
						<div id="modaleliminarP{!! $p->id !!}" class="modal">
  						<div class="modal-content">
  							<h4>Esta seguro que quiere eliminar el producto:</h4>
                <br>
                <div class="row">
                  <form action="eliminarP" method="POST" class="container col s12 m12 l12">
                    <div class="row">
											<div class="">
												<b>{!! $p->nombre !!}</b> con descripción: <i>{!! $p->descripcion !!}</i>
											</div>
                      <br>
                      <div class="modal-footer">
                        <input class="bordeModalbtn modal-action modal-close waves-effect waves-red btn-flat" onclick="" type="submit" name="submit" id="submit" value="Eliminar">
                      </div>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <input type="hidden" name="idp" id="idp" value="{!! $p->id !!}">
                    </div>
                  </form>
                </div>
  						</div>
  					</div>
            {!! $p->nombre !!}
						<a href="#modaleliminarP{!! $p->id !!}" class="secondary-content"><i style="color:red"class="material-icons">delete</i></a>
						<a href="#modalEditarProducto{!! $p->id !!}" class="secondary-content"><i class="material-icons">mode_edit</i></a>
          </div>
        </li>
      @endif
    @endforeach
    <br><br>
    <div id="modalAgregarProducto" class="modal">
      <div class="modal-content">
        <h4>Agregar producto</h4>
        <br>
        <div class="row">
          <form action="agregarProducto" method="POST" enctype="multipart/form-data" class="container col s12 m12 l12">
            <div class="row">
              <div class="input-field col s12 m6 l6">
                <input type="text" name="nombre" id="nombre">
                <label for="nombre">Nombre</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <input type="text" name="tiempo_uso" id="tiempo_uso">
                <label for="tiempo_uso">Tiempo de uso (en años)</label>
              </div>
              <div class="input-field col s12 m12 l12">
                <input type="text" name="antiguedad" id="antiguedad">
                <label for="antiguedad">Antigueda (en años)</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <textarea name="descripcion" id="descripcion" rows="8" cols="80" class="materialize-textarea"></textarea>
                <label for="descripcion">Descripción</label>
              </div>
              <div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP" id="fotoP">
              </div>
              <br>
              <div class="modal-footer">
                <input class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="" type="submit" name="btnAgregarPd" id="btnAgregarPd" value="Agregar">
              </div>
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </div>
          </form>
        </div>
      </div>
    </div>
    <a href="#modalAgregarProducto" class="btn-mine btn iniciobtn waves-effect waves-ligth" onclick="" type="submit" name="submit" id="submit">Agregar Producto</a>
    </form>
    </div>
  </div>
</main>
@endsection
