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
        			're_name'	=>	'test',
        			're_address'	=>	'---',
        			're_phone'	=>	'0',
        			're_cost_breakfast' => '1',
        			're_cost_lunch' => '1',
        			're_cost_dinner' => '1',
        			're_in_hotel' => '1',
        			]);
    }
}
