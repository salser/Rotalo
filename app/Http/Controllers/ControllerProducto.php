<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Categoria;
use App\User;
use App\Comentario;
use Input;
use Redirect;
use Auth;
use File;
use Crypt;
use View;

/*
* Controlador que maneja todos los post y gets en cuanto
* a el BREAD de productos concierne
*/
class ControllerProducto extends Controller
{
    /**
     * Actualiza la tupla en la base de datos de un producto.
     *
     */
    public function editar($id, $ncat, $catid)
    {
      $pdid = Crypt::decrypt($id);
      $user = Auth::user();
      $producto = Producto::find($pdid);
			$catid = Crypt::decrypt($catid);
			$categoria = Categoria::find($catid);
			$ncat = Crypt::decrypt($ncat);
      $cambio = '';
      if(Input::has('nombreP'.$pdid) && Input::has('tiempo_uso_a'.$pdid) && Input::has('antiguedad_a'.$pdid))
      {
				if(Input::hasFile('cFotoP'.$pdid))
				{
					File::delete($producto->foto);
					$foto = Input::file('cFotoP'.$pdid);
					$foto->move('productos', 'PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto= 'productos/PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP2'.$pdid))
				{
					File::delete($producto->foto2);
					$foto = Input::file('cFotoP2'.$pdid);
					$foto->move('productos', 'PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP3'.$pdid))
				{
					File::delete($producto->foto3);
					$foto = Input::file('cFotoP3'.$pdid);
					$foto->move('productos', 'PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP4'.$pdid))
				{
					File::delete($producto->foto4);
					$foto = Input::file('cFotoP4'.$pdid);
					$foto->move('productos', 'PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP5'.$pdid))
				{
					File::delete($producto->foto5);
					$foto = Input::file('cFotoP5'.$pdid);
					$foto->move('productos', 'PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
				if(Input::hasFile('cFotoP6'.$pdid))
				{
					File::delete($producto->foto6);
					$foto = Input::file('cFotoP6'.$pdid);
					$foto->move('productos', 'PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
					$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
				}
        $producto->nombre = Input::get('nombreP'.$pdid);
        $producto->tiempo_uso= Input::get('tiempo_uso_a'.$pdid);
        $producto->antiguedad = Input::get('antiguedad_a'.$pdid);
        if(Input::has('descripcion_a'.$pdid))
        {
          $producto->descripcion = Input::get('descripcion_a'.$pdid);
        }
				if(Input::has('cCat'.$pdid))
				{
					$c = Input::get('categoriaCambio'.$pdid);
					if ($c == 'Electrodomésticos')
					{
						if (Input::has('marcaC'.$categoria->id_producto) && Input::has('tipoC'.$categoria->id_producto)) {
							$categoria->marca = Input::get('marcaC'.$categoria->id_producto);
							$categoria->tipo = Input::get('tipoC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Vehículos') {
						if(Input::has('placaC'.$categoria->id_producto) && Input::has('modeloC'.$categoria->id_producto) && Input::has('marcaC'.$categoria->id_producto) && Input::has('kmC'.$categoria->id_producto) && Input::has('colorC'.$categoria->id_producto) && Input::has('combC'.$categoria->id_producto))
						{
							$categoria->placa = Input::get('placaC'.$categoria->id_producto);
							$categoria->modelo = Input::get('modeloC'.$categoria->id_producto);
							$categoria->marca = Input::get('marcaC'.$categoria->id_producto);
							$categoria->km = Input::get('kmC'.$categoria->id_producto);
							$categoria->color = Input::get('colorC'.$categoria->id_producto);
							$categoria->combustible = Input::get('combC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Literatura') {
						if (Input::has('edicionC'.$categoria->id_producto) && Input::has('editorialC'.$categoria->id_producto) && Input::has('autorC'.$categoria->id_producto)) {
							$categoria->edicion = Input::get('edicionC'.$categoria->id_producto);
							$categoria->editorial = Input::get('editorialC'.$categoria->id_producto);
							$categoria->autor = Input::get('autorC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Arte') {
						if (Input::has('tipoC'.$categoria->id_producto) && Input::has('anioC'.$categoria->id_producto) && Input::has('autorC'.$categoria->id_producto)) {
							$categoria->tipo = Input::get('tipoC'.$categoria->id_producto);
							$categoria->año = Input::get('anioC'.$categoria->id_producto);
							$categoria->autor = Input::get('autorC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}
					elseif ($c == 'Música') {
						if (Input::has('albumC'.$categoria->id_producto) && Input::has('generoC'.$categoria->id_producto) && Input::has('autorC'.$categoria->id_producto)) {
							$categoria->album = Input::get('albumC'.$categoria->id_producto);
							$categoria->genero = Input::get('generoC'.$categoria->id_producto);
							$categoria->autor = Input::get('autorC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}
					elseif ($c == 'Inmuebles') {
						if (Input::has('dirC'.$categoria->id_producto) && Input::has('banoC'.$categoria->id_producto) && Input::has('roomC'.$categoria->id_producto) && Input::has('anioC'.$categoria->id_producto)) {
							$categoria->direccion = Input::get('dirC'.$categoria->id_producto);
							$categoria->bano = Input::get('banoC'.$categoria->id_producto);
							$categoria->año = Input::get('anioC'.$categoria->id_producto);
							$categoria->alcobas = Input::get('roomC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Tablets-Teléfonos') {
						if (Input::has('marcaC'.$categoria->id_producto) && Input::has('referenciaC'.$categoria->id_producto) && Input::has('osC'.$categoria->id_producto)) {
							$categoria->marca = Input::get('marcaC'.$categoria->id_producto);
							$categoria->referencia = Input::get('referenciaC'.$categoria->id_producto);
							$categoria->os = Input::get('osC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Computadores') {
						if (Input::has('marcaC'.$categoria->id_producto) && Input::has('referenciaC'.$categoria->id_producto) && Input::has('osC'.$categoria->id_producto)) {
							$categoria->marca = Input::get('marcaC'.$categoria->id_producto);
							$categoria->referencia = Input::get('referenciaC'.$categoria->id_producto);
							$categoria->os = Input::get('osC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Consolas de Vidéo Juegos') {
						if (Input::has('marcaC'.$categoria->id_producto) && Input::has('referenciaC'.$categoria->id_producto) && Input::has('storageC'.$categoria->id_producto)) {
							$categoria->marca = Input::get('marcaC'.$categoria->id_producto);
							$categoria->referencia = Input::get('referenciaC'.$categoria->id_producto);
							$categoria->almacenamiento = Input::get('storageC'.$categoria->id_producto);
							$categoria->nombre_cat = $c;
						}else{
							$cambio = 'Cambio no realizado verifique cambios de la categoria a cambiar';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}
				}else {
					if ($ncat == "Electrodomésticos") {
						if(Input::has('marcaM'.$categoria->id_producto) && Input::has('tipoM'.$categoria->id_producto)){
							$categoria->marca = Input::get('marcaM'.$categoria->id_producto);
							$categoria->tipo = Input::get('tipoM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Vehículos") {
						if(Input::has('placaM'.$categoria->id_producto) && Input::has('modeloM'.$categoria->id_producto) && Input::has('marcaM'.$categoria->id_producto) && Input::has('kmM'.$categoria->id_producto) && Input::has('colorM'.$categoria->id_producto) && Input::has('combM'.$categoria->id_producto)){
							$categoria->placa = Input::get('placaM'.$categoria->id_producto);
							$categoria->modelo = Input::get('modeloM'.$categoria->id_producto);
							$categoria->marca = Input::get('marcaM'.$categoria->id_producto);
							$categoria->km = Input::get('kmM'.$categoria->id_producto);
							$categoria->color = Input::get('colorM'.$categoria->id_producto);
							$categoria->combustible = Input::get('combM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Literatura") {
						if(Input::has('edicionM'.$categoria->id_producto) && Input::has('editorialM'.$categoria->id_producto) && Input::has('autorM'.$categoria->id_producto)){
							$categoria->edicion = Input::get('edicionM'.$categoria->id_producto);
							$categoria->editorial = Input::get('editorialM'.$categoria->id_producto);
							$categoria->autor = Input::get('autorM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Arte") {
						if(Input::has('tipoM'.$categoria->id_producto) && Input::has('anioM'.$categoria->id_producto) && Input::has('autorM'.$categoria->id_producto)){
							$categoria->tipo = Input::get('tipoM'.$categoria->id_producto);
							$categoria->año = Input::get('anioM'.$categoria->id_producto);
							$categoria->autor = Input::get('autorM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Música") {
						if(Input::has('albumM'.$categoria->id_producto) && Input::has('generoM'.$categoria->id_producto) && Input::has('autorM'.$categoria->id_producto)){
							$categoria->album = Input::get('albumM'.$categoria->id_producto);
							$categoria->genero = Input::get('generoM'.$categoria->id_producto);
							$categoria->autor = Input::get('autorM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Inmuebles") {
						if(Input::has('banoM'.$categoria->id_producto) && Input::has('roomM'.$categoria->id_producto) && Input::has('dirM'.$categoria->id_producto) && Input::has('anioM'.$categoria->id_producto)){
							$categoria->bano = Input::get('banoM'.$categoria->id_producto);
							$categoria->room = Input::get('roomM'.$categoria->id_producto);
							$categoria->direccion = Input::get('dirM'.$categoria->id_producto);
							$categoria->año = Input::get('anioM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Tablets-Teléfonos") {
						if(Input::has('referenciaM'.$categoria->id_producto) && Input::has('osM'.$categoria->id_producto) && Input::has('marcaM'.$categoria->id_producto)){
							$categoria->referencia = Input::get('referenciaM'.$categoria->id_producto);
							$categoria->os = Input::get('osM'.$categoria->id_producto);
							$categoria->marca = Input::get('marcaM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Computadores") {
						if(Input::has('referenciaM'.$categoria->id_producto) && Input::has('osM'.$categoria->id_producto) && Input::has('marcaM'.$categoria->id_producto)){
							$categoria->referencia = Input::get('referenciaM'.$categoria->id_producto);
							$categoria->os = Input::get('osM'.$categoria->id_producto);
							$categoria->marca = Input::get('marcaM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
					else if ($ncat == "Consolas de Vidéo Juegos") {
						if(Input::has('referenciaM'.$categoria->id_producto) && Input::has('storageM'.$categoria->id_producto) && Input::has('marcaM'.$categoria->id_producto)){
							$categoria->referencia = Input::get('referenciaM'.$categoria->id_producto);
							$categoria->almacenamiento = Input::get('storageM'.$categoria->id_producto);
							$categoria->marca = Input::get('marcaM'.$categoria->id_producto);
						}else {
							$cambio = 'Cambio no realizado verifique campos categoría (quedaron vacios)';
							return Redirect::to('misProductos')
							->with('noCambio', $cambio)
							->withInput();
						}
					}
				}


				$categoria->save();
        $producto->save();
        $cambio = 'Cambio Realizado';
        return Redirect::to('misProductos')
                ->with('cambio', $cambio)
                ->withInput();
      }
      $cambio = 'Cambio no realizado verifique campos';
      return Redirect::to('misProductos')
              ->with('noCambio', $cambio)
              ->withInput();
      }


      /*
      * Agrega una nueva tupla a la tabla productos, y
      * se asocia con el id del usuario
      */
      public function agregar(){
        $agrega = '';
        if(Input::get('categoria') != '' && Input::has('nombre') && Input::has('tiempo_uso') && Input::has('antiguedad') && Input::has('descripcion'))
        {
          $producto = new Producto;
          $user = Auth::user();
          $userid = $user->id;
          $producto->nombre = Input::get('nombre');
          $producto->id_usuario = $userid;
          $producto->tiempo_uso= Input::get('tiempo_uso');
          $producto->antiguedad = Input::get('antiguedad');
          $producto->descripcion = Input::get('descripcion');
					$cat = new Categoria();
					$c = Input::get('categoria');
					if ($c == 'Electrodomésticos') {
						if (Input::has('marca') && Input::has('tipo')) {
							$cat->marca = Input::get('marca');
							$cat->tipo = Input::get('tipo');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Vehículos') {
						if(Input::has('placa') && Input::has('modelo') && Input::has('marca') && Input::has('km') && Input::has('color') && Input::has('comb'))
						{
							$cat->placa = Input::get('placa');
							$cat->modelo = Input::get('modelo');
							$cat->marca = Input::get('marca');
							$cat->km = Input::get('km');
							$cat->color = Input::get('color');
							$cat->combustible = Input::get('comb');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
							return Redirect::to('misProductos')
											->with('nAgregarProductos', $cambio)
											->withInput();
						}
					}elseif ($c == 'Literatura') {
						if (Input::has('edicion') && Input::has('editorial') && Input::has('autor')) {
							$cat->edicion = Input::get('edicion');
							$cat->editorial = Input::get('editorial');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Arte') {
						if (Input::has('tipo') && Input::has('anio') && Input::has('autor')) {
							$cat->tipo = Input::get('tipo');
							$cat->año = Input::get('anio');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Música') {
						if (Input::has('album') && Input::has('genero') && Input::has('autor')) {
							$cat->album = Input::get('album');
							$cat->genero = Input::get('genero');
							$cat->autor = Input::get('autor');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					elseif ($c == 'Inmuebles') {
						if (Input::has('dir') && Input::has('bano') && Input::has('room') && Input::has('anio')) {
							$cat->direccion = Input::get('dir');
							$cat->bano = Input::get('bano');
							$cat->año = Input::get('anio');
							$cat->alcobas = Input::get('room');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Tablets-Teléfonos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->os = Input::get('os');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Computadores') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('os')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->os = Input::get('os');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}elseif ($c == 'Consolas de Vidéo Juegos') {
						if (Input::has('marca') && Input::has('referencia') && Input::has('storage')) {
							$cat->marca = Input::get('marca');
							$cat->referencia = Input::get('referencia');
							$cat->almacenamiento = Input::get('storage');
						}else{
							$cambio = 'Producto no ha sido agregado verifique campos esten llenos';
			        return Redirect::to('misProductos')
			                ->with('nAgregarProductos', $cambio)
			                ->withInput();
						}
					}
					$producto->save();
					if(Input::hasFile('fotoP'))
					{
						$foto = Input::file('fotoP');
						$foto->move('productos', 'PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto= 'productos/PD_'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP2'))
					{
						$foto = Input::file('fotoP2');
						$foto->move('productos', 'PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto2= 'productos/PD_2'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP3'))
					{
						$foto = Input::file('fotoP3');
						$foto->move('productos', 'PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto3= 'productos/PD_3'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP4'))
					{
						$foto = Input::file('fotoP4');
						$foto->move('productos', 'PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto4= 'productos/PD_4'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP5'))
					{
						$foto = Input::file('fotoP5');
						$foto->move('productos', 'PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto5= 'productos/PD_5'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					if(Input::hasFile('fotoP6'))
					{
						$foto = Input::file('fotoP6');
						$foto->move('productos', 'PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension());
						$producto->foto6= 'productos/PD_6'.$user->nombre.$producto->id.".".$foto->getClientOriginalExtension();
					}
					$cat->nombre_cat = $c;
					$cat->id_producto = $producto->id;
					$producto->save();
					$cat->save();
	        $cambio = 'Producto agregado satisfactoriamente';
	        return Redirect::to('misProductos')
	                ->with('agregarProductos', $cambio)
	                ->withInput();
        }
        $cambio = 'Producto no agregado por favor verifique cambios';
        return Redirect::to('misProductos')
                ->with('nAgregarProductos', $cambio)
                ->withInput();
      }
			public function eliminar($idE){
				$id = Crypt::decrypt($idE);
				$producto = Producto::find($id);
				File::delete($producto->foto);
				File::delete($producto->foto2);
				File::delete($producto->foto3);
				File::delete($producto->foto4);
				File::delete($producto->foto5);
				File::delete($producto->foto6);
				Producto::where('id', $id)->delete();
				return Redirect::to('misProductos')
								->with('eliminado', 'Producto se eliminó satisfactoriamente')
								->withInput();
			}
			public function categoria($id)
			{
				$cat = Categoria::find($id);
			}
			public function especifico($id){
				$productos = Producto::all();
				$users = User::all();
				$categorias = Categoria::all();
        $comentarios = Comentario::all();
				$data = [
									'id' 				  => $id,
									'productos'   => $productos,
									'usuarios'    => $users,
									'categorias'  => $categorias,
                  'comentarios' => $comentarios
								];
				return View::make('productoEspecifico')
											->with($data);
			}
    }
