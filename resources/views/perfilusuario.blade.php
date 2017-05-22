@extends('rotaloLayout')
@section('title')
  @if (Auth::check())
    <title>{!! $user->username !!} | Perfil</title>
  @else
    <title>page not foud</title>
  @endif
@endsection
@section('content')
  @if (Auth::check())
    <main>
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="row">
              <div class="col s12 m6 l6">
                <h3 class="tituloPerfil">{!! $user->username !!}</h3>
              </div>
              <div class="col s12 m6 l6">
                <h3 class="tituloPerfil">Productos favoritos</h3>
              </div>
            </div>
            <div class="row">
              <ul class="collection perfil col s12 m6 l6">
                <li class="collection-item perfil avatar">
                  <img src="/{!! $user->foto !!}" alt="" class="circle">
                  <span class="title"><b>Nombre & Apellido</b></span>
                  <p>{!! $user->nombre !!} <br>
                     {!! $user->apellido !!}
                  </p>
                </li>
                <li class="collection-item perfil avatar">
                  <i class="material-icons circle">mail</i>
                  <span class="title"><b>Correo</b></span>
                  <p>
                    <?php
                      $aux = explode(".", $user->correo);
                      $aux2 = $aux[sizeof($aux)-1];
                     ?>
                    {!! $user->correo[0].$user->correo[1].'*****@'.explode('@', $user->correo)[1][0].'*******.'.$aux2 !!}
                  </p>
                </li>
                <li class="collection-item perfil avatar">
                  <i class="material-icons circle yellow">grade</i>
                  <span class="title"><b>Reputación</b></span>
                  <br>
                  <ul class="ratingN" style="margin-top: 20px; text-align: left;">
                  @if ($user->calificacion == 6)
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <span style="margin-left: 5px">0/5 <b>Sin Trueques</b></span>
                    </ul>
                  @endif
                  @if ($user->calificacion == 0)
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                      <li class="starNegra">&star;</li>
                    </ul>
                  @endif
                  @if ($user->calificacion == 1)
                      <li class="starN colored">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <span style="margin-left: 5px">1/5</span>
                    </ul>
                  @endif
                  @if ($user->calificacion == 2)
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <span style="margin-left: 5px">2/5</span>
                    </ul>
                  @endif
                  @if ($user->calificacion == 3)
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN">&star;</li>
                      <li class="starN">&star;</li>
                      <span style="margin-left: 5px">3/5</span>
                    </ul>
                  @endif
                  @if ($user->calificacion == 4)
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN">&star;</li>
                      <span style="margin-left: 5px">4/5</span>
                    </ul>
                  @endif
                  @if ($user->calificacion == 5)
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <li class="starN colored">&star;</li>
                      <span style="margin-left: 5px">5/5</span>
                    </ul>
                  @endif
                </li>
              </ul>
              <ul class="collection perfil col s12 m6 l6">
                @foreach($productos as $p)
                  @if ($p->id_usuario == $user->id)
                    <li class="collection-item perfil avatar">
                      <img src="/{!! $p->foto !!}" alt="" class="circle">
                      <span class="title"><b>Producto</b></span>
                      <p>{!! $p->nombre !!}<br>
                        <a href="/productoEspecifico/{!! $p->id !!}" style="color: #fd7b00">Ver producto</a>
                      </p>
                    </li>
                  @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  @else
    <main>
      <div class="container">
        <h1>Error 404 page not found</h1>
      </div>
    </main>
  @endif
@endsection
