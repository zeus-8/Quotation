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
        DB::table('shotels')->insert([
                    'sh_service'    =>  'N/T'
                ]);
        DB::table('shotels')->insert([
        			'sh_service'	=>	'TEST SERVICIO'
        		]);
    }
}
