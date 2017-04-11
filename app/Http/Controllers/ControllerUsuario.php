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
      if (Input::get('repetirContra') == Input::get('contrasena') && Input::hasFile('foto') && $existUser == 0 && $existMail == 0)
      {
				$foto = Input::file('foto');
        $foto->move('fotos', 'USER_'.$usuario->username.".".$foto->getClientOriginalExtension());
        $usuario->foto = 'fotos/USER_'.$usuario->username.".".$foto->getClientOriginalExtension();
        $usuario->save();
        return Redirect::to('inicio')
                  ->with('registrado', 'Usuario Registrado satisfatoriamente')
                  ->withInput();
      }

      return Redirect::to('registro')
                ->with('mensaje_error', $error)
                ->withInput();
    }
		public function cambiarFoto(User $user)
		{
			$userid = Auth::user()->id;
			$user = User::find($userid);
			if(Input::hasFile('foto'))
			{
				$foto = Input::file('cFoto');
				$foto->move('fotos', 'USER_'.$user->username.".".$foto->getClientOriginalExtension());
				$user->foto= 'fotos/USER_'.$user->username.".".$foto->getClientOriginalExtension();
				$user->save();
				return Redirect::to('perfil')
								->with('cambio', 'Foto cambiada satisfatoriamente')
								->withInput();
			}
			return Redirect::to('perfil')
							->with('cambio', 'no se cambio la foto por favor verifique el tamaño o que haya elegido correctamente su elección')
							->withInput();
		}
}
