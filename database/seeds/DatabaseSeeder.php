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
					'username' 		=> 'henry7',
					'correo'			=> 'henry2s@rotalo.com',
					'nombre'			=> 'Henry',
					'apellido'		=> 'Salazar',
					'password'	  => Hash::make('rotalo'),
          'foto'        => "No foto aun",
					'telefono'		=> '3186346954'
				));
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
