<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
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
					'username' 		=> 'henry',
					'correo'			=> 'henry@rotalo.com',
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
    }
}
?>
