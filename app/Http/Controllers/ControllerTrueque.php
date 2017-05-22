<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trueque;
use App\User;
use App\Producto;

use Redirect;
use Input;


class ControllerTrueque extends Controller
{

    /**
     * Show the form for creating a new trueque.
     *
     * @return Redirect to a existing view
     */
    public function crearTrueque($idP1, $idU1, $idU2)
    {
      if (Input::has('group1')) {
        $t = new Trueque;
        $t->estado = 3;
        $t->id_usuario1 = $idU1;
        $t->id_producto1 = $idP1;
        $t->id_usuario2 = $idU2;
        $t->id_producto2 = Input::get('group1');
        $t->calificacion1 = 6;
        $t->calificacion2 = 6;
        $t->save();
        $u1 = User::find($idU1);
        $pd1 = Producto::find($idP1);
        $u2 = User::find($idU2);
        $pd2 = Producto::find($t->id_producto2);

        //Correo donde se le va a mandar el correo del usuario
	      $to = $u1->correo;
	      //subject del correo al usuario
	      $subject = "Notificación Nuevo Trueque Rótalo";

	      //importación del mensaje html
	      include_once('crearTrueque.php');

	      //Este es el header del mail
	      $headers = 'From: noReply@rotalo.online' . "\r\n" .
	      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
	      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
	      //Manda el correo
	      mail($to, $subject, $message, $headers);
        return Redirect::to('productoEspecifico/'.$idP1)
                     ->with('trueque', 'El producto ha sido añadido al historial de trueques como trueque en espera');
      }
      return Redirect::to('productoEspecifico/'.$idP1)
                   ->with('nTrueque', 'El productono pude ser añadido, seleccione un producto para intercambiar');
    }

    /**
    * Return a view with retrospective message
    * Cancela un trueqe ya existente y hace retro alimentascion a ambos usuarios de que se cancelo trueque
    */
    public function cancelar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 4;
      $t->save();
      $u1 = User::find($t->id_usuario1);
      $pd1 = Producto::find($t->id_producto1);
      $u2 = User::find($t->id_usuario2);
      $pd2 = Producto::find($t->id_producto2);

      //Correo donde se le va a mandar el correo del usuario
      $to = $u1->correo;
      //subject del correo al usuario
      $subject = "Notificación Trueque Cancelado Rótalo";

      //Este es el formato del correo electronico
      $message =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u1->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue cancelado,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd1->nombre.' <br>
                Usuario que ofrecio: '.$u2->username.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd2->id.'">'.$pd2->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to, $subject, $message, $headers);

      //Correo donde se le va a mandar el correo del usuario
      $to2 = $u2->correo;
      //subject del correo al usuario
      $subject2 = "Notificación Trueque Cancelado Rótalo";

      //Este es el formato del correo electronico
      $message2 =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u2->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue cancelado,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd2->nombre.' <br>
                Usuario que ofrecio: '.$u1->username.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd1->id.'">'.$pd1->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers2 = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to2, $subject2, $message2, $headers2);
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha cancelado el trueque');
    }
    /**
    * Return a view with retrospective message
    * Acepta un trueqe ya existente y hace retro alimentascion a ambos usuarios de que se acepto el trueque
    * intercambiando los datos personales a cada uno
    */
    public function aceptar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 1;
      $p1 = Producto::find($t->id_producto1);
      $p2 = Producto::find($t->id_producto2);
      $p1->mostrado = false;
      $p2->mostrado = false;
      $p1->save();
      $p2->save();
      $t->save();
      $u1 = User::find($t->id_usuario1);
      $pd1 = Producto::find($t->id_producto1);
      $u2 = User::find($t->id_usuario2);
      $pd2 = Producto::find($t->id_producto2);

      //Correo donde se le va a mandar el correo del usuario
      $to = $u1->correo;
      //subject del correo al usuario
      $subject = "Notificación Trueque Aceptado Rótalo";

      //Este es el formato del correo electronico
      $message =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u1->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue Aceptado a continuación
              la información del trueque y la del otro usuario para poder hacer el cambio,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido. <br>
              Recuerda calificar el usuario despues de efectuarlo</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd1->nombre.' <br>
                Usuario dueño del otro producto: '.$u2->username.' <br>
                Nombre Usuario: '.$u2->nombre.' <br>
                Correo Usuario: '.$u2->correo.' <br>
                Teléfono Usuario: '.$u2->telefono.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd2->id.'">'.$pd2->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de trueques de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to, $subject, $message, $headers);

      //Correo donde se le va a mandar el correo del usuario
      $to2 = $u2->correo;
      //subject del correo al usuario
      $subject2 = "Notificación Trueque Cancelado Rótalo";

      //Este es el formato del correo electronico
      $message2 =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u2->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue Aceptado a continuación
              la información del trueque y la del otro usuario para poder hacer el cambio,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido. <br>
              Recuerda calificar el usuario despues de efectuarlo</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd2->nombre.' <br>
                Usuario dueño del otro producto: '.$u1->username.' <br>
                Nombre Usuario: '.$u1->nombre.' <br>
                Correo Usuario: '.$u1->correo.' <br>
                Teléfono Usuario: '.$u1->telefono.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd1->id.'">'.$pd1->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de trueques de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers2 = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to2, $subject2, $message2, $headers2);
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha aceptado el trueque por favor revise su correo electrónico allí encontrará los datos del otro usuario');
    }

    /**
    * Return a view with retrospective message
    * Rechaza un trueqe ya existente y hace retro alimentascion a ambos usuarios de que se rechazo trueque
    */
    public function rechazar($id, $username){
      $t = Trueque::find($id);
      $t->estado = 2;
      $t->save();
      $u1 = User::find($t->id_usuario1);
      $pd1 = Producto::find($t->id_producto1);
      $u2 = User::find($t->id_usuario2);
      $pd2 = Producto::find($t->id_producto2);

      //Correo donde se le va a mandar el correo del usuario
      $to = $u1->correo;
      //subject del correo al usuario
      $subject = "Notificación Trueque Rechazado Rótalo";

      //Este es el formato del correo electronico
      $message =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u1->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue Rechazado,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd1->nombre.' <br>
                Usuario que ofrecio: '.$u2->username.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd2->id.'">'.$pd2->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to, $subject, $message, $headers);

      //Correo donde se le va a mandar el correo del usuario
      $to2 = $u2->correo;
      //subject del correo al usuario
      $subject2 = "Notificación Trueque Rechazado Rótalo";

      //Este es el formato del correo electronico
      $message2 =
      '<html>

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />

        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

        <style media="screen">
          .headerMine{
            height: 100px;
            width: 100%;
            background-color: #149b5a;
          }
          .principal{
            margin-top: 50px;
            margin-bottom: 50px;
          }
          .footerMine{
            height: 200px;
            width: 100%;
            background-color: #236483;
          }
          .contenido{
            font-size: 2em;
          }
          .btn-mine{
            padding: 10px 10px 10px 10px;
            border: 2px solid black;
            background-color: rgba(72, 189, 17, 0.62);
            border-radius: 5px 1px 1px 1px;
            color: black;
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 1.5em;
          }
          .btn-mine:hover{
            background-color: rgba(38, 129, 251, 0.6);
          }
          h6{
            text-align: center;
            font-size: 2em;
          }
          a.btn-mine{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
          img{
            margin-left: auto;
            margin-right: auto;
            display: block;
          }
        </style>
      </head>

      <body>
        <main>
          <div class="headerMine">

          </div>
          <div class="container principal">
            <h2>Hola '.$u2->username.',</h2>
            <p class="contenido">
              El siguiente mensaje es para notificarte que uno de tus trueques fue Rechazado,
              ve a la plataforma inicia sesión y hecha un vistazo a tu historial de trueques con lo ocurrido</p>
              <b>Detalles</b><br>
              <p>
                Producto Mio: '.$pd2->nombre.' <br>
                Usuario que ofrecio: '.$u1->username.' <br>
                Producto que se quiere cambiar: <a style="color: black" href="/productoEspecifico/'.$pd1->id.'">'.$pd1->nombre.'</a> <br>
              </p>
              <h5><b>Atentamente: Equipo de soporte de Rótalo</b></h5>
              <br>
            <h6>Haz Click para iniciar sesión</h6>
            <a href="http://rotalo.online/inicio" class="btn-mine">Iniciar sesión</a>
            <img src="https://preview.ibb.co/cMkgVk/logo_Rotalo.png" class="responsive-img" alt="">
          </div>
          <div class="footerMine">

          </div>
        </main>
      </body>

      </html>';
      //Este es el header del mail
      $headers2 = 'From: noReply@rotalo.online' . "\r\n" .
      'Reply-To: henry.salazar@rotalo.online' . "\r\n" .
      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
      //Manda el correo
      mail($to2, $subject2, $message2, $headers2);
      return Redirect::to('historialTrueques/'.$username)->with('accion', 'Se ha rechazado el trueque, ya mismo se le fue notificado a el otro usuario');
    }

    /*
    * Función que califica al usuario
    */
    function calificarUsuario($idU, $idT){
      $user = User::find($idU);
      $t = Trueque::find($idT);
      $trueques = Trueque::all();
      $userC;
      $cal;
      if ($idU == $t->id_usuario1) {
        $cal = 1;
        $userC = User::find($t->id_usuario2);
      }else {
        $userC = User::find($t->id_usuario1);
        $cal = 2;
      }
      $cont = 0;
      $suma = 0;
      if(Input::has('calificacionS') && Input::has('calificacionC'.$t->id)){
        foreach ($trueques as $tr) {
          if($tr->id_usuario1 == $userC->id && $tr->calificacion2 != 6){
            $suma += $tr->calificacion2;
            $cont++;
          }
          if($tr->id_usuario2 == $userC->id && $tr->calificacion1 != 6){
            $suma += $tr->calificacion1;
            $cont++;
          }
        }
        $calificacionTrueque= Input::get('calificacionS');
        $suma += $calificacionTrueque;
        $cont++;
        $promedio = floor($suma/$cont);
        $userC->calificacion = floor($promedio);
        $comentario = $user->username.' :'.Input::get('calificacionC'.$t->id);
        if($cal == 1)
          $t->calificacion1 = $calificacionTrueque;
        else
          $t->calificacion2 = $calificacionTrueque;

        $comentarioVa = $t->comentario;
        $nuevoC = $comentarioVa.' '.$comentario;
        $t->comentario = $nuevoC;
        $userC->save();
        $t->save();
        return Redirect::to('historialTrueques/'.$user->username)->with('accion', 'Se calificao usuario');
      }
      return Redirect::to('historialTrueques/'.$user->username)->with('accionN', 'no se pudo calificar usuario intentelo de nuevo');
    }


}
