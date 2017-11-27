<?php

use Illuminate\Database\Seeder;

class TypeTransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_trans')->insert([
        	'descripcion'	=>	'AEREO'
        ]);
        DB::table('tipo_trans')->insert([
        	'descripcion'	=>	'MARITIMO'
        ]);
        DB::table('tipo_trans')->insert([
        	'descripcion'	=>	'TERRESTRE'
        ]);
    }
}
