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
        <li href="#!" class="collection-item avatar black-text col s12 m8 l8">
          <div class="">
            <div id="modalEditarProducto{!! $p->id !!}" class="modal modal-fixed-footer">
  						<div class="modal-content">
  							<h4>Editar Producto {!! $p->nombre !!}</h4>
                <br>
                <div class="row">
									<?php
												$id = $p->id;
												$id= Crypt::encrypt($id);
												$catid;
												$ncat;
									?>
									@foreach($categorias as $c)
										@if($c->id_producto == $p->id)
											<?php
												$ncat = Crypt::encrypt($c->nombre_cat);
												$catid = Crypt::encrypt($c->id);
											?>
										@endif
									@endforeach
                  <form id="cambiarP{!! $p->id !!}" action="editarProducto/{!! $id !!}/{!! $ncat !!}/{!! $catid !!}" method="POST" enctype="multipart/form-data" class="container col s12 m12 l12">
                    <div class="row">
                      <div class="input-field col s12 m6 l6">
                        <input type="text" name="nombreP{!! $p->id !!}" value="{!! $p->nombre !!}" id="nombreP{!! $p->id !!}">
                        <label for="nombreP{!! $p->id !!}">Nombre</label>
                      </div>
                      <div class="input-field col s12 m6 l6">
                        <input type="text" name="tiempo_uso_a{!! $p->id !!}" value="{!! $p->tiempo_uso !!}" id="tiempo_uso_a{!! $p->id !!}">
                        <label for="tiempo_uso_a{!! $p->id !!}">Tiempo de uso (en años)</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                        <input type="text" name="antiguedad_a{!! $p->id !!}" value="{!! $p->antiguedad !!}" id="antiguedad_a{!! $p->id !!}">
                        <label for="antiguedad_a{!! $p->id !!}">Antigueda (en años)</label>
                      </div>
                      <div class="input-field col s12 m12 l12">
                        <textarea name="descripcion_a{!! $p->id !!}" id="descripcion_a{!! $p->id !!}" rows="8" cols="80" class="materialize-textarea"></textarea>
                        <label for="descripcion_a{!! $p->id !!}">Descripción (si no desea cambiarla deje el campo vacio)</label>
                        <p>Descripción actual: {!! $p->descripcion !!}</p>
												<br>
												<?php echo 'Categoría '.$c->nombre_cat; ?>
												<br><br>
												<div class="catedit{!! $p->id !!}"></div>
                      </div>
											<div class="tooltipW input-field col s12 m8">
													<select class="selectCatEdit{!! $p->id !!} icons" name="categoriaCambio{!! $p->id !!}" id="categoriaCambio{!! $p->id !!}">
														<option value="0" disabled selected>Seleccione categoría</option>
														<option value="Electrodomésticos" 			>Electrodomésticos</option>
														<option value="Vehículos" 							>Vehículos</option>
														<option value="Literatura" 							>Literatura</option>
														<option value="Arte" 					 					>Arte</option>
														<option value="Música" 									>Música</option>
														<option value="Inmuebles"    						>Inmuebles</option>
														<option value="Tablets/Teléfonos" 			>Tablets/Teléfonos</option>
														<option value="Computadores"        		>Computadores</option>
														<option value="Consolas de Vidéo Juegos">Consolas de Vidéo Juegos</option>
													</select>
													<label>Cambiar Categoría</label>
													<span class="tooltiptextW">Para cambiar categoria: <br>1. Seleccione la categoria que desea.<br>2. Luego seleccione la casilla.<br>3. Haga click en ítems</span>
											</div>
											<div class=" tooltipW col s12 m2">
												<input class="cCat" type="checkbox" id="cCat{!! $p->id !!}"  value='1' name="cCat{!! $p->id !!}"/>
      									<label class="" for="cCat{!! $p->id !!}">Cambiar</label>
												<span class="tooltiptextW">Para cambiar categoria seleccione la casilla</span>
											</div>
											<div class="col s12 m2">
												<a onclick="cambioCategoria({!! $p->id !!})" style="width: auto; margin-top: 30px;" class="btn iniciobtn waves-effect waves-ligth">Items</a>
											</div>
											<br>
											<div class="cambioCat{!! $p->id !!}">

											</div>
											<br>
											<div class="container">
												<div class="col s12 m6 l4">
													<img class="imgCambio"  src="

													@if($p->foto != '')
														{!! $p->foto !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP{!! $p->id !!}" name="cFotoP{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto2 != '')
														{!! $p->foto2 !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP2{!! $p->id !!}" name="cFotoP2{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto3 != '')
														{!! $p->foto3 !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP3{!! $p->id !!}" name="cFotoP3{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto4 != '')
														{!! $p->foto4 !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP4{!! $p->id !!}" name="cFotoP4{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto5 != '')
														{!! $p->foto5 !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP5{!! $p->id !!}" name="cFotoP5{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
												<div class="col s12 m6 l4">
													<img class="imgCambio" src="
													@if($p->foto6 != '')
														{!! $p->foto6 !!}
													@else
														{!! 'productos/default.jpg' !!}
													@endif
													" alt=""><br>
													<label class="archivos">
														<div class="row">
															<div class="col offset-s4 s2">
																<div class="row">
																	<i class="material-icons">camera_enhance</i>
																	<input type="file" id="cFotoP6{!! $p->id !!}" name="cFotoP6{!! $p->id !!}" class="cFotoP"/>
																</div>
															</div>
														</div>
													</label>
												</div>
											</div>
                      <br><br>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    </div>
                  </form>
                </div>
  						</div>
							<div class="modal-footer">
								<a class="bordeModalbtn modal-action modal-close waves-effect waves-green btn-flat" onclick="$('#cambiarP{!! $p->id !!}').submit()">Cambiar</a>
							</div>
  					</div>
						<div id="modaleliminarP{!! $p->id !!}" class="modal">
  						<div class="modal-content">
  							<h4>Esta seguro que quiere eliminar el producto:</h4>
                <br>
                <div class="row">
									<?php
											$idE = Crypt::encrypt($p->id);
									 ?>
                  <form action="eliminarP/{!! $idE !!}" method="POST" class="container col s12 m12 l12">
                    <div class="row">
											<div class="container">
												<b>{!! $p->nombre !!}</b>
												<br>Descripción: <i>{!! $p->descripcion !!}</i><br>
												<i>Antiguedad:</i><br>
												{!! $p->antiguedad !!} años <br>
												<i>Tiempo de uso:</i><br>
												{!! $p->tiempo_uso !!} años <br>
												<i>Foto principal:</i><br>
												<img class="imgCambio" src="{!! $p->foto !!}" alt="">
											</div>
                      <br>
                      <div class="modal-footer">
                        <input class="bordeModalbtn modal-action modal-close waves-effect waves-red btn-flat" onclick="" type="submit" name="submit" id="submit" value="Eliminar">
                      </div>
                      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                      <input type="hidden" name="idp{!! $p->id !!}" id="idp{!! $p->id !!}" value="{!! $p->id !!}">
                    </div>
                  </form>
                </div>
  						</div>
  					</div>
						<img src="{!! $p->foto !!}" alt="" class="circle">
            <b>{!! $p->nombre !!}</b><br><i>Descripción: </i>{!! $p->descripcion !!}
						@foreach($categorias as $c)
							@if($c->id_producto == $p->id)
							<a style="margin-right: 30px" onclick='<?php $fn = "mostrarCat(".$c.")"; echo $fn;  ?>' href="#modalEditarProducto{!! $p->id !!}" class="secondary-content"><i class="material-icons">mode_edit</i></a>
							@endif
						@endforeach
						<a href="#modaleliminarP{!! $p->id !!}" class="secondary-content"><i style="color:red"class="material-icons">delete</i></a>
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
