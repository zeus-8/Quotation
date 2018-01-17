<?php

use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references')->insert([
    			'reference'	=>	'SANTA ISABEL',
                'localitie_id' => '1'
    		]);
        DB::table('references')->insert([
                'reference' =>  'TORTUGA BAY',
                'localitie_id' => '1'
            ]);
        DB::table('references')->insert([
                'reference' =>  'QUITO CENTRO',
                'localitie_id' => '2'
            ]);
        DB::table('references')->insert([
                'reference' =>  'QUITO SUR',
                'localitie_id' => '2'
            ]);
        DB::table('references')->insert([
                'reference' =>  'OTAVALO',
                'localitie_id' => '3'
            ]);
    }
}
