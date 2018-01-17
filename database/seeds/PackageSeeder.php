<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
        			'pa_name'	=>	'GALAPAGOS PARA TI',
        			'pa_cost_a'	=>	'699',
        			'pa_cost_n'	=>	'649',
        			'pa_cost_te'	=>	'649',
        			'pa_cost_e'	=>	'899',
        			'pa_cost_ne'	=>	'829',
    			]);
        DB::table('packages')->insert([
        			'pa_name'	=>	'GALAPAGOS PARA TI - CARNAVAL',
        			'pa_cost_a'	=>	'799',
        			'pa_cost_n'	=>	'729',
        			'pa_cost_te'	=>	'729',
        			'pa_cost_e'	=>	'999',
        			'pa_cost_ne' =>	'829',
    			]);
        DB::table('packages')->insert([
        			'pa_name'	=>	'GALAPAGOS FANTASTICO ESPECIAL',
        			'pa_cost_a'	=>	'799',
        			'pa_cost_n'	=>	'729',
        			'pa_cost_te'	=>	'729',
        			'pa_cost_e'	=>	'999',
        			'pa_cost_ne' =>	'829',
    			]);
        DB::table('packages')->insert([
        			'pa_name'	=>	'GALAPAGOS DE ENSUEÑO',
        			'pa_cost_a'	=>	'899',
        			'pa_cost_n'	=>	'799',
        			'pa_cost_te'	=>	'799',
        			'pa_cost_e'	=>	'1098',
        			'pa_cost_ne' =>	'999',
    			]);
    }
}
