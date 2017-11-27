<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' 		=>	'JUAN',
        	'apellido'	=>	'SIERRA',
        	'cedula'	=>	'123456789',
        	'email'		=>	'ZEUS.8.JL@GMAIL.COM',
        	'celular'	=>	'0995545441',
        	'direccion'	=>	'---',
        	'password'	=>	bcrypt('j15734681***'),
        	'id_tu'		=>	'1'
        ]);
    }
}
