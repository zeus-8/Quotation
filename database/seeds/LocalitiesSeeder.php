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
        			'localitie'	=>	'GALAPAGOS'
        		]);
        DB::table('localities')->insert([
        			'localitie'	=>	'QUITO'
        		]);
        DB::table('localities')->insert([
        			'localitie'	=>	'OTAVALO'
        		]);
    }
}
