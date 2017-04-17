@extends('rotaloLayout')

@section('content')
  <div class="container">
    <h1>Mis Productos</h1>
    @if(Session::has('cambio'))
      <p class="container" style="color: red;">{!! Session::get('cambio') !!}</p>
    @endif
    @if(Session::has('agregarProductos'))
      <p class="container" style="color: red;">{!! Session::get('agregarProductos') !!}</p>
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
            {!! $p->nombre !!}
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
@endsection
