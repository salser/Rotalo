<!-- Interfaz que extiende el layout de rotalo, y contiene el registro en el sistema para un usuario -->
@extends('rotaloLayout')

@section('content')
<main style="background-repeat: round; background-image: linear-gradient(rgba(255,255,255,0.4),rgba(255,255,255,0.4)), url({!! 'imgs/registroBG.JPG' !!})">
  <div class="row">
    <div class="col s12 l6 m6 offset-m3 offset-l3">
      <div class="row formas">
        @if(Session::has('mensaje_error'))
        <p class="container" style="color: red;">{!! Session::get('mensaje_error') !!}</p>
        @endif
        <h2>Registro</h2>
        <form class="col l12 s12 m12" action="crearUsuario" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="input-field col s12 m6 l6">
              {!! Form::text('nombre', Input::old('nombre')) !!}
              <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6 l6">
              {!! Form::text('apellido', Input::old('apellido')) !!}
              <label for="apellido">Apellido</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" type="email" name="correo" id="correo">
              <label for="correo">Correo</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input type="text" name="usuario" id="usuario">
              <label for="usuario">Nombre de Usuario</label>
            </div>
            <div class="input-field col s12 m12 l12">
              {!! Form::number('telefono', Input::old('telefono')) !!}
              <label for="telefono">Teléfono</label>
            </div>
            <div class="col s12 m12 l12">
              <label class="archivolbl">Foto de perfil</label><br>
              <input type="file" name="foto" id="foto">
            </div>
            <div class="input-field col s12 m6 l6">
              <input type="password" name="contrasena" id="contrasena">
              <label for="contrasena">Contraseña</label>
            </div>
            <div class="input-field col s12 m6 l6">
              <input type="password" name="repetirContra" id="repetirContra">
              <label for="repetirContra">Repetir Contraseña</label>
            </div>
          </div>
          <input class="btn iniciobtn waves-effect waves-ligth" onclick="" type="submit" name="submit" id="submit" value="Rótalo">
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        </form>
      </div>
    </div>
  </div>
</main>
@endsection
