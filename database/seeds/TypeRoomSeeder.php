<?php

use Illuminate\Database\Seeder;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('tipo_habi')->insert([
			'descripcion_habi'	=>	'SENCILLA'
		]); 
		DB::table('tipo_habi')->insert([
			'descripcion_habi'	=>	'MATRIMONIAL'
		]); 
		DB::table('tipo_habi')->insert([
			'descripcion_habi'	=>	'TRIPLE'
		]);
		DB::table('tipo_habi')->insert([
			'descripcion_habi'	=>	'CUADRUPLE'
		]);
    }
}
