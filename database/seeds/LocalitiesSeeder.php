<?php

use Illuminate\Database\Seeder;

class LocalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('localities')->insert([
        			'localitie'	=>	'HUMEDALES'
        			'reference_id' => '1'
        		]);
        DB::table('localities')->insert([
        			'localitie'	=>	'S. NEGRA-CONCHA PERLA'
        			'reference_id' => '1'
        		]);
        DB::table('localities')->insert([
        			'localitie'	=>	'TINTORERAS-GALAPAGUERA'
        			'reference_id' => '1'
        		]);
        DB::table('localitie')->insert([
        			'localitie'	=>	'ECCD + P. ALTA',
        			'reference_id' => '1'
    			]);
    }
}
