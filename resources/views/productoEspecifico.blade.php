@extends('rotaloLayout')
 @for ($i=0; $i < sizeof($productos); $i++)
 	@if ($productos[$i]->id == $id)
		@section('title')
			<title>Producto | {!! $productos[$i]->nombre !!}</title>
		@endsection
 	@endif
 @endfor
@section('content')
  {{-- background-repeat: round; background-image: url({!! '/imgs/pdtodos.jpg' !!}) para imagen de fondo en degrade --}}
	<main style="background: rgb(213, 213, 213)">
		@for ($i=0; $i < sizeof($productos) ; $i++)
			@if ($productos[$i]->id == $id)
			<div class="container">
        @if(Session::has('comentario'))
    		<div class="row">
    			<div class="col s12">
    				<div class="col s12 l3 m6">
    					<p class="change">{!! Session::get('comentario') !!}</p>
    				</div>
    			</div>
    		</div>
        @endif
    		@if(Session::has('nComentario'))
    		<div class="row">
    			<div class="col s12">
    				<div class="col s12 l4 m6">
    					<p class="nChange">{!! Session::get('nComentario') !!}</p>
    				</div>
    			</div>
    		</div>
    		@endif
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div style="border: 2px solid rgba(0, 137, 236, 0.46); border-radius: 5px" class="productosEspecifico col s12 m12 l8">
								<h1 class="categoriaNombre" style="background-color: rgba(0, 0, 0, 0); border: none">{!! $productos[$i]->nombre !!}</h1>
								<?php
									$aux = explode(" ", $productos[$i]->created_at)[0];
									$mes = explode("-", $aux)[1];
									$dia = explode("-", $aux)[2];
									$anio = explode("-", $aux)[0];
									if ($mes == 1)  $mes = "Enero";
									if ($mes == 2)  $mes = "Febrero";
									if ($mes == 3)  $mes = "Marzo";
									if ($mes == 4)  $mes = "Abril";
									if ($mes == 5)  $mes = "Mayo";
									if ($mes == 6)  $mes = "Junio";
									if ($mes == 7)  $mes = "Julio";
									if ($mes == 8)  $mes = "Agosto";
									if ($mes == 9)  $mes = "Septiembre";
									if ($mes == 10) $mes = "Octubre";
									if ($mes == 11)	$mes = "Noviembre";
									if ($mes == 12) $mes = "Diciembre";

								 ?>
								<h6 style="color: rgb(0, 0, 0)">Publicado: {!! $mes.' '.$dia.' del '.$anio !!}</h6>
								<!-- Swiper -->
								<div class="swiper-container">
									<div class="swiper-wrapper">
										@if ($productos[$i]->foto != "" &&
												($productos[$i]->foto2 == "" &&
												 $productos[$i]->foto3 == "" &&
												 $productos[$i]->foto4 == "" &&
												 $productos[$i]->foto5 == "" &&
												 $productos[$i]->foto6 == ""))
									 		 <img class="imgSola" src="/{!! $productos[$i]->foto !!}" alt="">
										@elseif ($productos[$i]->foto != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto !!});"></div>
										@endif
										@if ($productos[$i]->foto2 != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto2 !!});"></div>
										@endif
										@if ($productos[$i]->foto3 != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto3 !!});"></div>
										@endif
										@if ($productos[$i]->foto4 != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto4 !!});"></div>
										@endif
										@if ($productos[$i]->foto5 != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto5 !!});"></div>
										@endif
										@if ($productos[$i]->foto6 != "")
											<div class="swiper-slide" style="display: block; background-image:url(/{!! $productos[$i]->foto6 !!});"></div>
										@endif
									</div>
									<!-- Add Pagination -->
									<div class="swiper-pagination"></div>
									<!-- If we need navigation buttons -->
									<div class="swiper-button-prev"></div>
									<div class="swiper-button-next"></div>
								</div>
								<div class="">
									<div style="margin-left: 10px" class="nombreCategoria col s12">

									</div>
									<br><br><br>
											<form class="col s12 l12">
												<div class="categoriaProducto row">

												</div>
												<div class="row">
													<div class="fieldCategoria col s12">
														Descripción:
													</div>
													<div class="col s12">
														<p>{!! $productos[$i]->descripcion !!}</p>
													</div>
												</div>
											</form>
								</div>
								<div class="botonesProducto">
									<form class="botones col l6 m12 s12" action="index.html" method="post">
										<input class="btn iniciobtn waves-effect waves-ligth" type="submit" name="quiero" value="Lo quiero">
									</form>
									<form class="botones col l6 m12 s12" action="index.html" method="post">
										<input class="btn iniciobtn waves-effect waves-ligth"  type="submit" name="quiero" value="Añade a la lista de deseos">
									</form>
								</div>
								<div style="margin-top: 100px"class="">
                  <br><br><br><br><br><br>
                  <?php
                    $cont = 0;
                  ?>
									@if (Auth::check())
                    <h4 style="margin-top: 20px">Comentarios</h4>
                    <div class="container">
                      @foreach ($comentarios as $comentario)
                        @if ($comentario->id_producto == $id)
                          <?php $cont++; ?>
                          <div class="comentario row">
                            <div class="col s12 m12 l12">
                              <div class="row">
                                <?php
                                $usuCom = App\User::find($comentario->id_autor);
                                $nombre = $usuCom->nombre." ".$usuCom->apellido;
                                $username = $usuCom->username;
                                $foto = $usuCom->foto;
                                ?>
                                <div class="col s12 m4 l3">
                                  <img class="hide-on-small-only circle imgcom" src="/{!! $foto !!}" alt="">
                                </div>
                                <div class="col s12 m8 l9">
                                  <h6 style="padding-top: 15px"><b>{!! $nombre !!}</b></h6>
                                  <h6><b>{!! $username !!}</b></h6>
                                  <?php
                                  $aux = explode(" ", $comentario->created_at)[0];
                                  $mes = explode("-", $aux)[1];
                                  $dia = explode("-", $aux)[2];
                                  $anio = explode("-", $aux)[0];
                                  if ($mes == 1)  $mes = "Enero";
                                  if ($mes == 2)  $mes = "Febrero";
                                  if ($mes == 3)  $mes = "Marzo";
                                  if ($mes == 4)  $mes = "Abril";
                                  if ($mes == 5)  $mes = "Mayo";
                                  if ($mes == 6)  $mes = "Junio";
                                  if ($mes == 7)  $mes = "Julio";
                                  if ($mes == 8)  $mes = "Agosto";
                                  if ($mes == 9)  $mes = "Septiembre";
                                  if ($mes == 10) $mes = "Octubre";
                                  if ($mes == 11)	$mes = "Noviembre";
                                  if ($mes == 12) $mes = "Diciembre";
                                  ?>
                                  <h6 style="text-align: right">{!! $mes.' '.$dia.' del '.$anio !!}</h6>
                                  <p class="detalleComent">{!! $comentario->descripcion !!}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                      @if (Auth::user()->id != $productos[$i]->id_usuario)
                        <div class="row">
                          <form style="background-color: white; margin-top: 15px; border-radius: 5px;" class="col s12" action="/agregarComentario/{!! Auth::user()->id !!}/{!! $id!!}" method="post">
                            <div class="row">
                              <div class="input-field col s12">
                                <textarea id="comentario" name="comentario" class=""></textarea>
                                <label for="comentario">Nuevo Comentario</label>
                              </div>
                              <input style="margin-left: 10px; height: 30px"class="btn iniciobtn waves-effect waves-ligth" type="submit" name="" value="Enviar">
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            </div>
                          </form>
                        </div>
                      @endif
                      @if ($cont == 0)
                        <h6>Sin comentarios</h6>
                      @endif
                    </div>
									@endif
								</div>
							</div>
							@for ($j=0; $j < sizeof($categorias); $j++)
								@if ($categorias[$j]->id_producto == $id)
									<script type="text/javascript">
									<?php $fn = "categoriaProducto(".$categorias[$j].")"; echo $fn;?>
									</script>
								@endif
							@endfor
							<div class="row">
								<div class="productosEspecifico rounded col s12 m12 l3 offset-l1">
									@for ($j=0; $j < sizeof($usuarios) ; $j++)
										@if ($productos[$i]->id_usuario == $usuarios[$j]->id)
											<h4 class="userProduct">{!! $usuarios[$j]->username !!}</h4>
											<img class="imgUserPd circle" src="/{!! $usuarios[$j]->foto !!}" alt="">
											<div class="perfilUsuario">
												<a href="#perfilUsuario">Ver Perfil</a>
											</div>
											<br>
											<ul class="ratingN">
												<div style="text-align: center; font-weight: bold;">
													<h6>Reputación</h6>
												</div>
											@if ($usuarios[$j]->calificacion == 0)
													<li class="starNegra">&star;</li>
													<li class="starNegra">&star;</li>
													<li class="starNegra">&star;</li>
													<li class="starNegra">&star;</li>
													<li class="starNegra">&star;</li>
												</ul>
												<h6 class="white-text">Sin trueques</h6>
											@endif
											@if ($usuarios[$j]->calificacion == 1)
													<li class="starN colored">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
												</ul>
											@endif
											@if ($usuarios[$j]->calificacion == 2)
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
												</ul>
											@endif
											@if ($usuarios[$j]->calificacion == 3)
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN">&star;</li>
													<li class="starN">&star;</li>
												</ul>
											@endif
											@if ($usuarios[$j]->calificacion == 4)
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN">&star;</li>
												</ul>
											@endif
											@if ($usuarios[$j]->calificacion == 5)
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
													<li class="starN colored">&star;</li>
												</ul>
											@endif
										@endif
									@endfor
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
		@endfor
	</main>
@endsection
@section('script')
	<!-- Swiper JS -->
	<script src="{!! 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.js'!!}"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
		  // Navigation arrows
		  nextButton: '.swiper-button-next',
		  prevButton: '.swiper-button-prev',
			coverflow: {
				rotate: 50,
				stretch: 0,
				depth: 100,
				modifier: 1,
				slideShadows: true
			}
		});
	</script>
@endsection
