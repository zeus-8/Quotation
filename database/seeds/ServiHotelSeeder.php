<?php

use Illuminate\Database\Seeder;

class ServiHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servi_hotel')->insert([
        			'servicio'	=>	'TEST SERVICIO'
        		]);
    }
}
