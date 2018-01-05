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
        			'reference'	=>	'SANTA ISABEL'
        		]);
        DB::table('references')->insert([
                    'reference' =>  'TORTUGA BAY'
                ]);
    }
}
