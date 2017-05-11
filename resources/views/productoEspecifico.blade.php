@extends('rotaloLayout')
 @for ($i=0; $i < sizeof($productos); $i++)
 	@if ($productos[$i]->id == $id)
		@section('title')
			<title>Producto | {!! $productos[$i]->nombre !!}</title>
		@endsection
 	@endif
 @endfor
@section('content')
	<main style="background-repeat: round; background-image: url({!! '/imgs/pdtodos.jpg' !!})">
		@for ($i=0; $i < sizeof($productos) ; $i++)
			@if ($productos[$i]->id == $id)
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div style="border: 2px solid rgba(255, 151, 0, 0.63)" class="productosEspecifico col s12 m12 l8">
								<h1 class="categoriaNombre">{!! $productos[$i]->nombre !!}</h1>
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
								<h6 style="color: white">Publicado: {!! $mes.' '.$dia.' del '.$anio !!}</h6>
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
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto !!})"></div>
										@endif
										@if ($productos[$i]->foto2 != "")
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto2 !!})"></div>
										@endif
										@if ($productos[$i]->foto3 != "")
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto3 !!})"></div>
										@endif
										@if ($productos[$i]->foto4 != "")
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto4 !!})"></div>
										@endif
										@if ($productos[$i]->foto5 != "")
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto5 !!})"></div>
										@endif
										@if ($productos[$i]->foto6 != "")
											<div class="swiper-slide" style="background-image:url(/{!! $productos[$i]->foto6 !!})"></div>
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
								<div class="">
									@if (Auth::check())
										<h4>Comentarios</h4>
										<div class="comentario">
											<img class="circle imgcom" src="{!! 'https://pythoniza.me/static/app/img/default.gif' !!}" alt="">
											<h6><b>NombreAutor</b></h6>
											<br>
											<p class="detalleComent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
