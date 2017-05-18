@extends('rotaloLayout')
@section('title')
  <title>Contacto | Rótalo</title>
@endsection
@section('content')
  <main>
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="row" style="border: 2px solid rgba(0, 137, 236, 0.46); margin-top: 70px; padding: 20px 10px 20px 10px;">
            @if(Session::has('mensaje'))
        		<div class="row">
        			<div class="col s12">
        				<div class="col s12 l3 m6">
        					<p class="change">{!! Session::get('mensaje') !!}</p>
        				</div>
        			</div>
        		</div>
            @endif
        		@if(Session::has('mensajeN'))
        		<div class="row">
        			<div class="col s12">
        				<div class="col s12 l4 m6">
        					<p class="nChange">{!! Session::get('mensajeN') !!}</p>
        				</div>
        			</div>
        		</div>
        		@endif
            <form class="col s12 m6 l6" method="post" action="/enviarPQR">
              <div class="row">
                <div class="input-field col s12 m6 l6">
                  <input id="nombre" name="nombre" type="text" class="validate">
                  <label for="nombre">Nombre & Apellido</label>
                </div>
                <div class="input-field col s12 m6 l6">
                  <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="correo" id="correo">
                  <label for="correo">Correo</label>
                </div>
                <div class="input-field col s12">
                  <input id="asunto" name="asunto" type="text" class="validate">
                  <label for="asunto">Asunto, Reclamo, Queja o Petición</label>
                </div>
                <div class="input-field col s12">
                  <textarea id="contenido" name="contenido" class="materialize-textarea"></textarea>
                  <label for="contenido">Contenido</label>
                </div>
              </div>
              <div class="g-recaptcha" data-sitekey="6LdFiyEUAAAAAOlD20SxrIsS48PH7Lni6faHiRyV"></div>
              <input style="margin-top: 10px" class="btn iniciobtn waves-effect waves-ligth" onclick="" type="submit" name="submit" id="submit" value="Enviar">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            </form>
            <div class="col s12 m6 l6">
              <img class="responsive-img"src="{!! '/imgs/pqr.jpg' !!}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
