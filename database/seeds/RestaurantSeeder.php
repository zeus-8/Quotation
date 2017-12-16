<?php

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant')->insert([
        			'nombre'	=>	'test',
        			'direccion'	=>	'---',
        			'telefono'	=>	'0',
        			'costo_desayuno' => '1',
        			'costo_almuerzo' => '1',
        			'costo_cena' => '1',
        			'en_hotel' => '1',
        			]);
    }
}
