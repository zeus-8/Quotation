<?php

use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usu')->insert([
        	'descripcion_tu'	=>	'ADMIN'
        ]);
        DB::table('tipo_usu')->insert([
        	'descripcion_tu'	=>	'USUARIO'
        ]);
    }
}
