@extends('rotaloLayout')

@section('title')
	<title>Productos</title>
@endsection
@section('content')
	<main style="background-repeat: round; background-image: linear-gradient(rgba(255,255,255,0.4),rgba(255,255,255,0.4)), url({!! 'imgs/pdtodos.jpg' !!})">
		<?php
			$nombre_cat = Session::get('nombre_cat');
			$categorias = Session::get('categorias');
			$usuarios = Session::get('usuarios');
		 ?>
		 <div class="container">
			 <h3>{!! $nombre_cat !!}</h3>
			 <div class="row">
	       <div class="col s12">
	         <div class="row">
	           @for ($i=0; $i < sizeof($categorias) ; $i++)
	           <div class="col s12 m6 l4">
	             <div class="card">
	               <div class="card-image">
	                 <img class="imgCard responsive-img" src="{!! $categorias[$i]->foto !!}">
	                 <a class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
	               </div>
	               <div class="card-content">
	                 <span class="card-title">{!! $categorias[$i]->nombre !!}</span>
	                 <p>Años de uso: {!! $categorias[$i]->tiempo_uso !!}</p>
	               </div>
	               <div class="card-action">
	                 <?php $usuario; ?>
	                 @foreach ($usuarios as $u)
	                   @if( $u->id == $categorias[$i]->id_usuario)
	                     <?php $usuario = $u ?>
	                   @endif
	                 @endforeach
	                 <a href="#">Usuario: {!! $usuario->nombre !!}</a>
	               </div>
	             </div>
	           </div>
	           @endfor
	         </div>
	       </div>
	     </div>
		 </div>
		</main>
@endsection
