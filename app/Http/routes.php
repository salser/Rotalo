<?php

use App\Producto;
use App\User;
use App\Categoria;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Ruta para mostrar formulario de login
Route::get('inicio', 'Controller@muestraLogin');

// Validamos los datos de inicio de sesión.
Route::post('inicio', 'Controller@postLogin');

// Nos indica que las rutas que están dentro de él sólo serán mostradas si antes el usuario se ha autenticado.
Route::group(array('before' => 'auth'), function()
{
    // Esta será nuestra ruta de bienvenida.
    Route::get('perfil', function()
    {
        return view('perfil');
    });
    // Esta ruta nos servirá para cerrar sesión.
    Route::get('cerrar', 'Controller@cerrar');

});


//Ruta que redirige a la pantalla de inicio de rotalo
Route::get('/', function () {
    return view('inicioRotalo');
});

//Ruta que redirige ahacia el registro de un usuario
Route::get('Registro', function()
{
  return view('registro');
});

/**
* Rutas que redirigen y  llaman a las funciones de usuario para las operaciones BREAD
*/
Route::get('registro', 'ControllerUsuario@mostrarRegistro');
Route::post('crearUsuario', 'ControllerUsuario@crearUsuario');

Route::post('cambiarFoto', 'ControllerUsuario@cambiarFoto');
Route::post('cambiarTelefono', 'ControllerUsuario@cambiarTelefono');

/**
* Rutas que redirigen y  llaman a las funciones de producto para las operaciones BREAD
*/
Route::get('misProductos', function()
{
  $productos = Producto::all();
	$categorias = Categoria::all();
	$data = [
            'productos' => $productos,
            'categorias'  => $categorias
          ];
  return View::make('misproductos')->with($data);
});

Route::post('editarProducto','ControllerProducto@editar');
Route::post('agregarProducto', 'ControllerProducto@agregar');

Route::get('todosProductos', function(){
  $productos = Producto::all();
  $usuarios = User::all();
  $data = [
            'productos' => $productos,
            'usuarios'  => $usuarios
          ];
  return View::make('productostodos')->with($data);
});
Route::post('eliminarP', 'ControllerProducto@eliminar');
