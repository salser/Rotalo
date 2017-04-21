<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;

/*
* Crea una tupla sin foto dentro de la tabla de usuarios
* Con php artisan db:seed en la cmd
*/
class SeederTablaUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
					'username' 		=> 'Casmkill',
					'correo'			=> 'Casmkill@rotalo.com',
					'nombre'			=> 'Carlos',
					'apellido'		=> 'Saldarriaga',
					'password'	  => Hash::make('rotalo'),
          'foto'        => "No foto aun",
					'telefono'		=> '3218007103'
				));
    }
}

/*
* Crea una tupla sin foto dentro de la tabla de productos
* Con php artisan db:seed en la cmd
*/
class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('producto')->truncate();
      factory(App\Producto::class)->create([
        'nombre'        =>'Nuevo Producto',
        'tiempo_uso'    =>'admin',
        'antiguedad'    => 'admin@admin.com',
        'foto'          => 'nohay',
        'descripcion'   =>'1'
      ]);
      factory(App\Producto::class, 49)->create();
    }
}

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::reguard();

				$this->call(SeederTablaUsuario::class);
        $this->call(ProductosSeeder::class);
    }
}

?>
