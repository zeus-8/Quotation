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
		DB::table('rooms')->insert([
			'room'	=>	'SENCILLA'
		]); 
		DB::table('rooms')->insert([
			'room'	=>	'MATRIMONIAL'
		]);
		DB::table('rooms')->insert([
			'room'	=>	'DOBLE'
		]); 
		DB::table('rooms')->insert([
			'room'	=>	'TRIPLE'
		]);
		DB::table('rooms')->insert([
			'room'	=>	'CUADRUPLE'
		]);
    }
}
