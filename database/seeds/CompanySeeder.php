<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
                    'co_name'   =>  'N/T'
                ]);
        DB::table('companies')->insert([
        			'co_name'	=>	'COMPANIA 1'
        		]);
        DB::table('companies')->insert([
        			'co_name'	=>	'COMPANIA 2'
        		]);
        DB::table('companies')->insert([
        			'co_name'	=>	'COMPANIA 3'
        		]);
    }
}
