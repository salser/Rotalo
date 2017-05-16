<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Redirect;
use Auth;
use File;

/*
* Controlador que maneja todos los post y gets en cuanto
* a el BREAD del usuario concierne
*/
class ControllerUsuario extends Controller
{

		/*
    ** Retorna la vista de registro para el usuario
    ** @return \Illuminate\Http\Response
    */
    public function mostrarRegistro()
    {
      return view('registro');
    }

    /*
    ** Crea el usuario y hace la insersión a la base de datos
    ** @return \Illuminate\Http\Response
    */
    public function crearUsuario(Request $request)
    {
      $error = '';
      $usuario = new User;
      $usuario->nombre = Input::get('nombre');
			$usuario->apellido = Input::get('apellido');
      $usuario->username = Input::get('usuario');
			$usuario->telefono = Input::get('telefono');
			$usuario->correo = Input::get('correo');
			$usuario->password = Hash::make(Input::get('contrasena'));

			//echo json_encode($request->all());

			if(!Input::has('telefono'))
			{
				$error = $error.'No digite un número de teléfono valido'.'<br>';
			}
			//Validación de datos del usuario
			$existUser= User::where('username', '=', Input::get('usuario'))->count();
			if ( $existUser > 0 ) {
				$error = $error.'Usuario ya existe<br>';
			}
			$existMail= User::where('correo', '=', Input::get('correo'))->count();
			if ( $existMail > 0 ) {
				$error = $error.'Ya hay una cuenta asociada con ese correo<br>';
			}
      if(!Input::hasFile('foto'))
      {
        $error = $error.'No hay foto elegida'.'<br>';
      }
			if(Input::get('repetirContra') != Input::get('contrasena'))
      {
        $error = $error.'Contraseñas no coinciden'.'<br>';
      }
      if (Input::has('telefono') && Input::get('repetirContra') == Input::get('contrasena') && Input::hasFile('foto') && $existUser == 0 && $existMail == 0)
      {
				$foto = Input::file('foto');
        $foto->move('fotos', 'USER_'.$usuario->username.".".$foto->getClientOriginalExtension());
        $usuario->foto = 'fotos/USER_'.$usuario->username.".".$foto->getClientOriginalExtension();
        $usuario->save();

				//Correo donde se le va a mandar el correo del usuario
	      $to = $usuario->correo;
	      //subject del correo al usuario
	      $subject = "Bienvenido A Rotalo";

	      //Este es el formato del correo electronico
	      $message = '<html>
										<head>
											<meta charset="utf-8">
											<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
											<!-- Compiled and minified CSS -->
											<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

											<style media="screen">
												.headerMine{
													height: 200px;
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
												a{
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
													<h2>Hola '.$usuario->username.',</h2>
													<p class="contenido">Para el equipo de Rótalo es todo un placer darte la bienveida a esta tu plataforma preferida, podras hacer cambios como tu quieras, <b>Si no lo usas, RÓTALO</b></p>
													<h6>Haz Click para empezar a hacer cambios</h6>
													<a href="http://rotalo.online" class="btn-mine">Rótalo</a>
													<img src="../imgs/logoRotalo.png" class="responsive-img" alt="">
												</div>
												<div class="footerMine">

												</div>
											</main>
										</body>
										</html>'
	      //Este es el header del mail
	      $headers = 'From: noreply@rotalo.online' . "\r\n" .
	      'Reply-To: henry.salaza@rotalo.online' . "\r\n" .
	      'MIME-Version: 1.0' . "\r\n".'Content-type:text/html;charset=ISO-8859-1'."\r\n";
	      //Manda el correo
	      mail($to, $subject, $message, $headers);

        return Redirect::to('inicio')
                  ->with('registrado', 'Usuario Registrado satisfatoriamente')
                  ->withInput();
      }

      return Redirect::to('registro')
                ->with('mensaje_error', $error)
                ->withInput();
    }

		/*
		* Cambia la foto  de usuario y hace un update de usuario en la base de datos
		*/
		public function cambiarFoto(User $user)
		{
			$userid = Auth::user()->id;
			$user = User::find($userid);
			if(Input::hasFile('cFoto'))
			{
				$foto = Input::file('cFoto');
				File::delete($user->foto);
				$foto->move('fotos', 'USER_'.$user->username.".".$foto->getClientOriginalExtension());
				$user->foto= 'fotos/USER_'.$user->username.".".$foto->getClientOriginalExtension();
				$user->save();
				return Redirect::to('perfil')
								->with('cambio', 'Foto cambiada satisfatoriamente')
								->withInput();
			}
			return Redirect::to('perfil')
							->with('noCambio', 'No se cambio la foto por favor verifique el tamaño o que haya elegido correctamente su elección')
							->withInput();
		}

		/*
		* Cambia el numero de telefono del usuario y hace un update de usuario en la base de datos
		*/
		public function cambiarTelefono(User $user)
		{
			$userid = Auth::user()->id;
			$user = User::find($userid);
			if(Input::has('tel'))
			{
				$telefono = Input::get('tel');
				$user->telefono = $telefono;
				$user->save();
				return Redirect::to('perfil')
								->with('cambio', 'Teléfono cambiado satisfatoriamente')
								->withInput();
			}
			return Redirect::to('perfil')
							->with('noCambio', 'No se cambio el número de teléfono adecuadamente por favor verifique que el formato sea adecuado')
							->withInput();
		}
}
