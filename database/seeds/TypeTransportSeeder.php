<?php

use Illuminate\Database\Seeder;

class TypeTransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ttransfers')->insert([
        	'tt_transfer'	=>	'AEREO'
        ]);
        DB::table('ttransfers')->insert([
        	'tt_transfer'	=>	'MARITIMO'
        ]);
        DB::table('ttransfers')->insert([
        	'tt_transfer'	=>	'TERRESTRE'
        ]);
    }
}
