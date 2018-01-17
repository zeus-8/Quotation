<?php

use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
                    're_name'   =>  'N/T',
                    're_address'    =>  '---',
                    're_phone'  =>  '0',
                    're_cost_breakfast' => '0',
                    're_cost_lunch' => '0',
                    're_cost_dinner' => '0',
                    're_in_hotel' => '0',
                    ]);
        DB::table('restaurants')->insert([
        			're_name'	=>	'TEST RESTAURANT',
        			're_address'	=>	'---',
        			're_phone'	=>	'0',
        			're_cost_breakfast' => '10',
        			're_cost_lunch' => '11.50',
        			're_cost_dinner' => '12.99',
        			're_in_hotel' => '1',
        			]);
    }
}
