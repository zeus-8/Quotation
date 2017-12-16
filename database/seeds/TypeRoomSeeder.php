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
		DB::table('habitaciones')->insert([
			'descripcion'	=>	'SENCILLA'
		]); 
		DB::table('habitaciones')->insert([
			'descripcion'	=>	'MATRIMONIAL'
		]);
		DB::table('habitaciones')->insert([
			'descripcion'	=>	'DOBLE'
		]); 
		DB::table('habitaciones')->insert([
			'descripcion'	=>	'TRIPLE'
		]);
		DB::table('habitaciones')->insert([
			'descripcion'	=>	'CUADRUPLE'
		]);
    }
}
