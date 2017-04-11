<?php

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



Route::get('/', function () {
    return view('inicioRotalo');
});

Route::get('Registro', function()
{
  return view('registro');
});

Route::get('registro', 'ControllerUsuario@mostrarRegistro');
Route::post('crearUsuario', 'ControllerUsuario@crearUsuario');

Route::post('cambiarFoto', 'ControllerUsuario@cambiarFoto');
