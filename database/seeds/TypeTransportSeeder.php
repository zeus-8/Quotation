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
        	'descripcion_tra'	=>	'AEREO'
        ]);
        DB::table('tipo_trans')->insert([
        	'descripcion_tra'	=>	'MARITIMO'
        ]);
        DB::table('tipo_trans')->insert([
        	'descripcion_tra'	=>	'TERRESTRE'
        ]);
    }
}
