@extends('rotaloLayout')

@section('title')
	<title>Productos</title>
@endsection
@section('content')
	<main style="background: rgb(213, 213, 213)">
		<?php
			$cont = 0;
		 ?>
		 <div class="container">
			 <h4 class="categoriaNombre">{!! $nombre_cat !!}</h4>
			 <div class="row">
				 <div class="col s12">
					 <div class="row">
							 @for ($i=0; $i < sizeof($categorias); $i++)
								 @if ($categorias[$i]->nombre_cat == $nombre_cat)
									 @for ($j=0; $j < sizeof($productos) ; $j++)
										 @if ($productos[$j]->id == $categorias[$i]->id_producto)
											 <?php $cont++; ?>
											 <div class="col s12 m6 l4">
												 <div class="card">
													 <div class="card-image">
														 <img class="imgCard responsive-img" src="/{!! $productos[$j]->foto !!}">
														 <a href="/productoEspecifico/{!! $productos[$j]->id !!}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
													 </div>
													 <div class="card-content">
														 <span class="card-title">{!! $productos[$j]->nombre !!}</span>
														 <p>Años de uso: {!! $productos[$j]->tiempo_uso !!}</p>
													 </div>
													 <div class="card-action">
														 <?php $usuario; ?>
														 @foreach ($usuarios as $u)
															 @if( $u->id == $productos[$j]->id_usuario)
																 <?php $usuario = $u ?>
															 @endif
														 @endforeach
														 <a href="#">Usuario: {!! $usuario->username !!}</a>
													 </div>
												 </div>
											 </div>
										 @endif
									 @endfor
								 @endif
							 @endfor
							 @if ($cont == 0)
							 	<script type="text/javascript">
							 		mensajeSesion('{!! "No hay productos en la categoria ".$nombre_cat !!}')
									window.location = "{!! url('/') !!}";
							 	</script>
							 @endif
						 </div>
					 </div>
				 </div>
			 </div>
	 </main>
@endsection
