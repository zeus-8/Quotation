<?php

use Illuminate\Database\Seeder;

class TypeHostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('thotels')->insert([
        			'type_hotel'	=>	'AGENCIA DE VIAJES'
                ]);
        DB::table('thotels')->insert([
                    'type_hotel'  =>  'ECO LODGE'
                ]);
		DB::table('thotels')->insert([
                    'type_hotel'  =>  'ECOLODGE Y TOUR'
                ]);
        DB::table('thotels')->insert([
                   'type_hotel'   =>  'ECO LODGE KAPAWI' 
                ]);	
        DB::table('thotels')->insert([
                    'type_hotel'  =>  'HOSTERIA'            
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' =>  'HOTEL'        
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'HOTEL CON PISCINA'          
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'HOTEL DE PRIMERA'          
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'HOTEL TURISTA'          
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'LODGE'            
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'LODGE 4 ESTRE'            
                ]);			
		DB::table('thotels')->insert([
                    'type_hotel' => 'LODGE ECONOM'            
                ]);
        DB::table('thotels')->insert([
                    'type_hotel' => 'TEST'            
                ]);			
    }
}
