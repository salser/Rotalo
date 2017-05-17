<!-- Interfaz que extiende el layout de rotalo, y contiene todos los productos dentro del sistema -->
@extends('rotaloLayout')
@section('title')
<title>Productos|Todos</title>
@endsection
@section('content')
<main style="background: rgb(213, 213, 213)">

  <div class="container">
    <h1>Productos en Rótalo</h1>
    <div class="row">
      <div class="col s12">
        <div class="row">
          @foreach ($productos as $p)
            @if ($p->mostrado == true)
              <div class="col s12 m6 l4">
                <div class="card">
                  <div class="card-image">
                    <img class="imgCard responsive-img" src="{!! $p->foto !!}">
                    <a href="/productoEspecifico/{!! $p->id !!}" class="btn-floating halfway-fab waves-effect " style="color: rgb(201, 237, 178)"><i class="material-icons" style="color: black">add</i></a>
                  </div>
                  <div class="card-content">
                    <span class="card-title">{!! $p->nombre !!}</span>
                    <p>{!! $p->tiempo_uso !!} años de uso</p>
                    <?php
                    $aux = explode(" ", $p->created_at)[0];
                    $horaE = explode(" ", $p->created_at)[1];
                    $horas = explode(":", $horaE)[0];
                    $min = explode(":", $horaE)[1];
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
                    <p>{!! $mes.' '.$anio !!}</p>
                  </div>
                  @if (Auth::check())
                    <div class="card-action">
                      <?php $usuario; ?>
                      @foreach ($usuarios as $u)
                        @if( $u->id == $p->id_usuario)
                          <?php $usuario = $u ?>
                        @endif
                      @endforeach
                      <a href="perfilUsuario/{!! $usuario->username !!}/{!! $usuario->id !!}">Usuario: {!! $usuario->username !!}</a>
                    </div>
                  @endif
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
