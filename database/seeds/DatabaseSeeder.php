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
					'usuario' 		=> 'henry',
					'correo'			=> 'henry@rotalo.com',
					'nombre'			=> 'Henry Salazar',
					'contrasena'	=> Hash::make('rotalo')
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
