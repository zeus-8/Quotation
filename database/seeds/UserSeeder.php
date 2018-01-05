<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' 		=>	'JUAN',
        	'us_last_name'	=>	'SIERRA',
        	'us_id_card'	=>	'123456789',
        	'email'		=>	'ADMIN@MAIL.COM',
        	'us_cell_phone'	=>	'0995545441',
        	'password'	=>	bcrypt('123'),
        	'tuser_id'		=>	'1'
        ]);
    }
}
