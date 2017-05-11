<!-- Interfaz que extiende el layout de rotalo, y contiene todos los productos dentro del sistema -->
@extends('rotaloLayout')
@section('title')
<title>Productos|Todos</title>
@endsection
@section('content')
<main style="background-repeat: round; background-image: url({!! 'imgs/pdtodos.jpg' !!})">

  <div class="container">
    <h1>Productos en Rótalo</h1>
    <div class="row">
      <div class="col s12">
        <div class="row">
          @foreach ($productos as $p)
          <div class="col s12 m6 l4">
            <div class="card">
              <div class="card-image">
                <img class="imgCard responsive-img" src="{!! $p->foto !!}">
                <a href="/productoEspecifico/{!! $p->id !!}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <span class="card-title">{!! $p->nombre !!}</span>
                <p>Años de uso: {!! $p->tiempo_uso !!}</p>
              </div>
              <div class="card-action">
                <?php $usuario; ?>
                @foreach ($usuarios as $u)
                  @if( $u->id == $p->id_usuario)
                    <?php $usuario = $u ?>
                  @endif
                @endforeach
                <a href="#">Usuario: {!! $usuario->username !!}</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
