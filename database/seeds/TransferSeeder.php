<?php

use Illuminate\Database\Seeder;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transfers')->insert([
				'tr_name'	=>	'TRANS 1',
				'tr_last_name'	=>	'TRANS IN',
				'tr_cell_phone'	=>	'74125896',
				'tr_cost'	=>	'20',
				'reference_id'	=>	'1'
			]);
        DB::table('transfers')->insert([
    			'tr_name'	=>	'TRANS 2',
    			'tr_last_name'	=>	'TRANS out',
    			'tr_cell_phone'	=>	'74125896',
    			'tr_cost'	=>	'20',
    			'reference_id'	=>	'1'
			]);
        DB::table('transfers')->insert([
    			'tr_name'	=>	'TRANS 3',
    			'tr_last_name'	=>	'ruta',
    			'tr_cell_phone'	=>	'74125896',
    			'tr_cost'	=>	'20',
    			'reference_id'	=>	'1'
			]);
        DB::table('transfers')->insert([
				'tr_name'	=>	'TRANS 4',
				'tr_last_name'	=>	'TRANS IN',
				'tr_cell_phone'	=>	'74025896',
				'tr_cost'	=>	'20',
				'reference_id'	=>	'1'
			]);
        DB::table('transfers')->insert([
    			'tr_name'	=>	'TRANS 5',
    			'tr_last_name'	=>	'TRANS out',
    			'tr_cell_phone'	=>	'74025896',
    			'tr_cost'	=>	'20',
    			'reference_id'	=>	'1'
			]);
        DB::table('transfers')->insert([
    			'tr_name'	=>	'TRANS 6',
    			'tr_last_name'	=>	'ruta',
    			'tr_cell_phone'	=>	'74025896',
    			'tr_cost'	=>	'20',
    			'reference_id'	=>	'1'
			]);
    }
}
