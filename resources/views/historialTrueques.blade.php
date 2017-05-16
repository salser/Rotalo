@extends('rotaloLayout')
@section('title')
  <title>Historial Trueques | {!! Auth::user()->username !!}</title>
@endsection
@section('content')
  <?php
    $user = Auth::user();
  ?>
  <main style="background-color: rgb(213, 213, 213)">
    <div class="container">
      @if(Session::has('accion'))
  		<div class="row">
  			<div class="col s12">
  				<div class="col s12 l3 m6">
  					<p class="change">{!! Session::get('accion') !!}</p>
  				</div>
  			</div>
  		</div>
      @endif
      <h4>Historial de Trueques</h4>
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="row">
            <div class="col 12 m12 l12">
              <ul style="background-color: white;" class="collection with-header">
                <li class="collection-header">
                  <h4>Cambios ofrecidos</h4>
                  <h6>Mi Producto-----------------------------Lo que quiero</h6>
                </li>
                @foreach ($trueques as $t)
                  <?php
                    $producto1 = App\Producto::find($t->id_producto1);
                    $producto2 = App\Producto::find($t->id_producto2);
                  ?>
                  <?php
  									$aux = explode(" ", $t->created_at)[0];
                    $horaE = explode(" ", $t->created_at)[1];
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
                  @if ($t->id_usuario2 == $user->id && $t->estado == 3)
                    <div class="listItem">
                      <li class="col s12 m12 l5">
                        <img src="/{!! $producto2->foto !!}" alt="" class="circle truequeMuestra">
                        <img src="{!! '/imgs/rotalo-icono.png' !!}" alt="" class="circle truequeMuestra">
                        <img src="/{!! $producto1->foto !!}" alt="" class="circle truequeMuestra">
                      </li>
                      <li style="height:100%"class="col s12 m12 l4">
                        <p>
                          <b>ESTADO:</b> En Espera<br>
                          <b>Lo que quiero:</b> {!! $producto1->nombre !!} <br>
                          <b>Mi Producto:</b> {!! $producto2->nombre !!} <br>
                          <b>Fecha:</b> {!! $mes.' '.$dia.' del '.$anio !!} <br>
                          <b>Hora:</b> {!! $horas.':'.$min !!}
                        </p>
                      </li>
                      <li class="botonesHT col s12 m12 l3">
                        <a href="/cancelarT/{!! $t->id !!}/{!! $user->username !!}" style="background-color: red; color: white;" class="btnTrueque">Cancelar</a>
                      </li>
                    </div>
                  @endif
                @endforeach
              </ul>
            </div>
            <div class="row">
              <div class="col 12 m12 l12">
                <ul style="background-color: white;" class="collection with-header">
                  <li class="collection-header">
                    <h4>Cambios que me ofrecen</h4>
                    <h6>Lo que ofrecen-----------------------Lo que quieren</h6>
                  </li>

                  @foreach ($trueques as $t)
                    <?php
                      $producto1 = App\Producto::find($t->id_producto1);
                      $producto2 = App\Producto::find($t->id_producto2);
                    ?>
                    <?php
                      $aux = explode(" ", $t->created_at)[0];
                      $horaE = explode(" ", $t->created_at)[1];
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
                    @if ($t->id_usuario1 == $user->id && $t->estado == 3)
                      <div class="listItem">
                        <li class="col s12 m12 l5">
                          <img src="/{!! $producto2->foto !!}" alt="" class="circle truequeMuestra">
                          <img src="{!! '/imgs/rotalo-icono.png' !!}" alt="" class="circle truequeMuestra">
                          <img src="/{!! $producto1->foto !!}" alt="" class="circle truequeMuestra">
                        </li>
                        <li style="height:100%"class="col s12 m12 l4">
                          <p>
                            <b>ESTADO:</b> En Espera<br>
                            <b>Lo que quieren:</b> {!! $producto1->nombre !!} <br>
                            <b>Lo que ofrecen:</b> {!! $producto2->nombre !!} <br>
                            <b>Fecha:</b> {!! $mes.' '.$dia.' del '.$anio !!} <br>
                            <b>Hora:</b> {!! $horas.':'.$min !!}
                          </p>
                        </li>
                        <li class="botonesHT col s12 m12 l3">
                          <a href="/aceptar/{!! $t->id !!}/{!! $user->username !!}" class="btnTrueque">Aceptar</a>
                          <a href="/rechazar/{!! $t->id !!}/{!! $user->username !!}" style="background-color: red; color: white;" class="btnTrueque">Rechazar</a>
                        </li>
                      </div>
                    @endif
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col 12 m12 l12">
                <ul style="background-color: white;" class="collection with-header">
                  <li class="collection-header">
                    <h4>Historial</h4>
                    <h6>Mi Producto-----------------------------Intercambio</h6>
                  </li>
                  @foreach ($trueques as $t)
                    <?php
                      $producto1 = App\Producto::find($t->id_producto1);
                      $producto2 = App\Producto::find($t->id_producto2);
                    ?>
                    <?php
    									$aux = explode(" ", $t->created_at)[0];
                      $horaE = explode(" ", $t->created_at)[1];
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
                     @if ($t->estado != 3)
                       @if ($t->id_usuario2 == $user->id || $t->id_usuario1 == $user->id)
                         <div class="listItem">
                           <li class="col s12 m12 l5">
                             @if ($producto1->id_usuario == $user->id)
                               <img src="/{!! $producto1->foto !!}" alt="" class="circle truequeMuestra">
                               <img src="{!! '/imgs/rotalo-icono.png' !!}" alt="" class="circle truequeMuestra">
                               <img src="/{!! $producto2->foto !!}" alt="" class="circle truequeMuestra">
                             @endif
                             @if ($producto2->id_usuario == $user->id)
                               <img src="/{!! $producto2->foto !!}" alt="" class="circle truequeMuestra">
                               <img src="{!! '/imgs/rotalo-icono.png' !!}" alt="" class="circle truequeMuestra">
                               <img src="/{!! $producto1->foto !!}" alt="" class="circle truequeMuestra">
                             @endif
                           </li>
                           <li style="height:100%"class="col s12 m12 l4">
                             <p>
                               <?php
                               $state = ' ';
                               if ($t->estado == 1) {
                                 $state = 'Aceptado';
                               }
                               if ($t->estado == 2) {
                                 $state = 'Rechazado';
                               }
                               if ($t->estado == 4) {
                                 $state = 'Cancelado';
                               }
                               ?>
                               <b>ESTADO: </b>{!! $state !!}<br>
                               <b>Lo que quiero:</b> {!! $producto1->nombre !!} <br>
                               <b>Mi Producto:</b> {!! $producto2->nombre !!} <br>
                               <b>Fecha:</b> {!! $mes.' '.$dia.' del '.$anio !!} <br>
                               <b>Hora:</b> {!! $horas.':'.$min !!}
                             </p>
                           </li>
                         </div>
                       @endif
                     @endif
                  @endforeach
                </ul>
              </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
