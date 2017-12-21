<?php

use Illuminate\Database\Seeder;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tusers')->insert([
        	'type_user'	=>	'ADMIN'
        ]);
        DB::table('tusers')->insert([
        	'type_user'	=>	'USUARIO'
        ]);
    }
}
