<?php

use hive\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * @var User
     */
    private $user;

    /**
     * Run the database seeds.
     *
     * @param User $user
     */

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function run()
    {
        /*
        DB::table('users')->insert([
        	'name' 		=>	'JUAN',
        	'us_last_name'	=>	'SIERRA',
        	'us_id_card'	=>	'123456789',
        	'email'		=>	'ADMIN@MAIL.COM',
        	'us_cell_phone'	=>	'0995545441',
        	'password'	=>	bcrypt('123'),
        	'tuser_id'		=>	'1'
        ]);
        */

        $this->user->create([
            'name' 		    =>	'JUAN',
            'us_last_name'	=>	'SIERRA',
            'us_id_card'	=>	'123456789',
            'email'		    =>	'ADMIN@MAIL.COM',
            'us_cell_phone'	=>	'0995545441',
            'password'	    =>	bcrypt('123'),
            'tuser_id'		=>	'1'
        ]);

        $this->user->create([
            'name' 		    =>	'TEST',
            'us_last_name'	=>	'TEST',
            'us_id_card'	=>	'123456787',
            'email'		    =>	'TEST@MAIL.COM',
            'us_cell_phone'	=>	'0995545441',
            'password'	    =>	bcrypt('123'),
            'tuser_id'		=>	'1'
        ]);
    }
}
