<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'reference_id' => '1'
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
            'reference_id' => '1'
	       		]);

	    $hotel_room = [];

	    for ($hotel = 1; $hotel <= 2; $hotel++) {

	        for ($room = 1; $room <= 5; $room++) {

                $hotel_room[] = [

                    'hotel_id' => $hotel,
                    'room_id'  => $room,
                    'cost'     => $hotel * $room
                ];
            }
        }

        DB::table('hotel_room')->insert($hotel_room);
    }
}
