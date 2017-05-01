<!-- Interfaz que extiende el layout de rotalo, y contiene la lista de el usuario autenticado en rotalo-->
@extends('rotaloLayout')
@section('title')
<title>Mis productos</title>
@endsection
@section('content')
<main>
  <div style="display:none" class="productos">
    <?php echo $productos; ?>
  </div>
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
            <div id="modalEditarProducto{!! $p->id !!}" class="modal modal-fixed-footer">
  						<div class="modal-content">
  							<h4>Editar Producto {!! $p->nombre !!}</h4>
                <br>
                <div class="row">
                  <form id="cambiarP" action="editarProducto" method="POST" enctype="multipart/form-data" class="container col s12 m12 l12">
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
												<br>
                      </div>
											<div class="input-field col s8">
												<select class="selectCatEdit{!! $p->id !!} icons" name="categoria" id="categoria">
													<option value="0" disabled selected>Seleccione categoría</option>
													<option value="Electrodomésticos" 			data-icon="imgs/electro.jpg" class="circle">Electrodomésticos</option>
													<option value="Vehículos" 							data-icon="imgs/vehi.jpg" class="circle">Vehículos</option>
													<option value="Literatura" 							data-icon="imgs/lite.jpg" class="circle">Literatura</option>
													<option value="Arte" 					 					data-icon="imgs/art.jpg" class="circle">Arte</option>
													<option value="Música" 									data-icon="imgs/music.jpg" class="circle">Música</option>
													<option value="Inmuebles"    						data-icon="imgs/inm.jpg" class="circle">Inmuebles</option>
													<option value="Tablets/Teléfonos" 			data-icon="imgs/phone.jpg" class="circle">Tablets/Teléfonos</option>
													<option value="Computadores"        		 data-icon="imgs/pc.jpg" class="circle">Computadores</option>
													<option value="Consolas de Vidéo Juegos" data-icon="imgs/vg.jpg" class="circle">Consolas de Vidéo Juegos</option>
												</select>
												<label>Categoría</label>
											</div>
											@foreach($categorias as $c)
												@if($c->id_producto == $p->id)
													<div class="col s4">
														<a onclick='<?php $fn = "mostrarCat(".$c.")"; echo $fn;  ?>' style="width:auto" class="btn iniciobtn waves-effect waves-ligth waves-input-wrapper" href="#">mostrar</a>
													</div>
												@endif
											@endforeach
											<div class="catedit{!! $p->id !!}">

				              </div>
											<div class="container">
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto != '')
														{!! $p->foto !!}
													@endif
													@if($p->foto == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP" name="cFotoP" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto2 != '')
														{!! $p->foto2 !!}
													@endif
													@if($p->foto2 == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP2" name="cFotoP2" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto3 != '')
														{!! $p->foto3 !!}
													@endif
													@if($p->foto3 == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP3" name="cFotoP3" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto4 != '')
														{!! $p->foto4 !!}
													@endif
													@if($p->foto4 == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP4" name="cFotoP4" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto5 != '')
														{!! $p->foto5 !!}
													@endif
													@if($p->foto5 == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP5" name="cFotoP5" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto6 != '')
														{!! $p->foto6 !!}
													@endif
													@if($p->foto6 == '')
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP6" name="cFotoP6" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
											</div>
                      <br><br>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <input type="hidden" name="id" id="id" value="{!! $p->id !!}">
                    </div>
                  </form>
                </div>
  						</div>
							<div class="modal-footer">
								<a class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="$('#cambiarP').submit()">Cambiar</a>
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
    <div id="modalAgregarProducto" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4>Agregar producto</h4>
        <br>
        <div class="row">
          <form id="agregarP" action="agregarProducto" method="POST" enctype="multipart/form-data" class="container col s12 m12 l12">
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
              <div class="input-field col s12">
                <textarea name="descripcion" id="descripcion" rows="8" cols="80" class="materialize-textarea"></textarea>
                <label for="descripcion">Descripción</label>
              </div>
							<div class="input-field col s12">
								<select class="selectCat icons" name="categoria" id="categoria">
									<option value="0" disabled selected>Seleccione categoría</option>
									<option value="Electrodomésticos" 			data-icon="imgs/electro.jpg" class="circle">Electrodomésticos</option>
									<option value="Vehículos" 							data-icon="imgs/vehi.jpg" class="circle">Vehículos</option>
									<option value="Literatura" 							data-icon="imgs/lite.jpg" class="circle">Literatura</option>
									<option value="Arte" 					 					data-icon="imgs/art.jpg" class="circle">Arte</option>
									<option value="Música" 									data-icon="imgs/music.jpg" class="circle">Música</option>
									<option value="Inmuebles"    						data-icon="imgs/inm.jpg" class="circle">Inmuebles</option>
									<option value="Tablets/Teléfonos" 			data-icon="imgs/phone.jpg" class="circle">Tablets/Teléfonos</option>
									<option value="Computadores"        		 data-icon="imgs/pc.jpg" class="circle">Computadores</option>
									<option value="Consolas de Vidéo Juegos" data-icon="imgs/vg.jpg" class="circle">Consolas de Vidéo Juegos</option>
								</select>
								<label>Categoría</label>
							</div>
							<div class="cat">

              </div>
              <div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP" id="fotoP">
              </div>
							<br>
							<div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP2" id="fotoP2">
              </div>
							<br>
							<div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP3" id="fotoP3">
              </div>
							<br>
							<div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP4" id="fotoP4">
              </div>
							<br>
							<div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP5" id="foto5">
              </div>
							<br>
							<div class="col s12 m12 l12">
                <label class="archivolbl">Selecciona Foto</label><br>
                <input type="file" name="fotoP6" id="fotoP6">
              </div>
							<br>
              <br>
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </div>
          </form>
        </div>
      </div>
			<div class="modal-footer">
				<a class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="$('#agregarP').submit()">Agregar</a>
			</div>
    </div>
    <a href="#modalAgregarProducto" class="btn-mine btn iniciobtn waves-effect waves-ligth" onclick="" type="submit" name="submit" id="submit">Agregar Producto</a>
    </form>
    </div>
  </div>
</main>
@endsection
