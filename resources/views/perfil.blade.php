@extends('rotaloLayout')

@section('content')
<div class="container">
</div>
		<div class="container">
			<h4>Hola {!! Auth::user()->nombre !!} estos son los datos de tu perfil</h4>
			<ul class="collection">
		    <li class="collection-item avatar">
		      <img src="{!! Auth::user()->foto !!}" alt="" class="circle">
		      <span class="title">Nombre</span>
		      <p>
						{!! Auth::user()->nombre !!}
		      </p>
		      <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
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
			<a href="/cerrar">Cerrar sesión.</a>
		</div>
@endsection
