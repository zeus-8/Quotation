<?php

use Illuminate\Database\Seeder;

class HostelGalapagosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hotels')->insert([
       			'ho_name'	=>	'TROTUGA BAY',
       			'ho_address'	=>	'PARTE ALTA',
       			'ho_cell_phone'	=>	'0553801544',
       			'ho_phone' 		=> '0553801544',
       			'ho_email' => 'TORTUGABY@MAIL.COM',
       			'ho_contac' => 'ALEXANDRA ALDAZ',
       			'thotel_id' => '6',
       			'restaurant_id' => '1',
       			'shotel_id' => '1',
       			]);
	    DB::table('hotels')->insert([
       			'ho_name'	=>	'LOBO DE MAR',
       			'ho_address'	=>	'---',
       			'ho_cell_phone'	=>	'2502089',
       			'ho_phone' 		=> '2502089',
                'ho_ext'    => '101',
       			'ho_email' => 'LOBODEMAR@MAIL.COM',
   				'ho_contac' => 'ALEYDIS',
   				'thotel_id' => '6',
       			'restaurant_id' => '1',
       			'shotel_id' => '1',
	       		]);
    }
}
