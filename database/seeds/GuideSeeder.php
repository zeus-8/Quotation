<?php

use Illuminate\Database\Seeder;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guides')->insert([
        			'gu_name'	=>	'GUIA 1',
        			'gu_cell_phone'	=>	'215246253',
        			'gu_email'	=>	'1@mail.com',
        			'cost'	=>	'20',
        			'reference_id' => '1'
        			]);
        DB::table('guides')->insert([
        			'gu_name'	=>	'GUIA 2',
        			'gu_cell_phone'	=>	'115246253',
        			'gu_email'	=>	'2@mail.com',
        			'cost'	=>	'20',
        			'reference_id' => '1'
        			]);
        DB::table('guides')->insert([
        			'gu_name'	=>	'GUIA 3',
        			'gu_cell_phone'	=>	'215246253',
        			'gu_email'	=>	'3@mail.com',
        			'cost'	=>	'20',
        			'reference_id' => '2'
        			]);
        DB::table('guides')->insert([
        			'gu_name'	=>	'GUIA 4',
        			'gu_cell_phone'	=>	'215246253',
        			'gu_email'	=>	'4@mail.com',
        			'cost'	=>	'20',
        			'reference_id' => '2'
        			]);
    }
}
