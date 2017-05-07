@extends('rotaloLayout')
@section('title')
	<title>Producto | </title>
@endsection
<?php
	$productos = Session::get('productos');
	$id = Session::get('id');
	$id = substr($id, 1, sizeof($id)-2);
	$usuarios = Session::get('usuarios');
 ?>
@section('content')
	<main style="background-repeat: round; background-image: url({!! 'imgs/pdtodos.jpg' !!})">
		@for ($i=0; $i < sizeof($productos) ; $i++)
			@if ($productos[$i]->id == $id)
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="row">
							<div class="productosEspecifico col s12 m12 l8">
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
										@if ($productos[$i]->foto != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										@if ($productos[$i]->foto2 != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto2 !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										@if ($productos[$i]->foto3 != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto3 !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										@if ($productos[$i]->foto4 != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto4 !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										@if ($productos[$i]->foto5 != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto5 !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										@if ($productos[$i]->foto6 != "")
											<div class="swiper-slide" style="background-image:url({!! $productos[$i]->foto6 !!})"></div>
										@else
											<div class="swiper-slide" style="background-image:url({!! 'productos/default.jpg' !!})"></div>
										@endif
										</div>
									<!-- Add Pagination -->
									<div class="swiper-pagination"></div>
								</div>
							</div>
							<div class="productosEspecifico col s12 m12 l3 offset-l1">
								@for ($j=0; $j < sizeof($usuarios) ; $j++)
									@if ($productos[$i]->id_usuario == $usuarios[$j]->id)
										<h4 class="userProduct">{!! $usuarios[$j]->username !!}</h4>
										<img class="imgUserPd circle" src="{!! $usuarios[$j]->foto !!}" alt="">
									@endif
								@endfor
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
		@endfor
	</main>
@endsection
@section('Swipper')
	<!-- Swiper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/js/swiper.js"></script>

	<!-- Initialize Swiper -->
	<script>
		var swiper = new Swiper('.swiper-container', {
			pagination: '.swiper-pagination',
			effect: 'coverflow',
			grabCursor: true,
			centeredSlides: true,
			slidesPerView: 'auto',
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
