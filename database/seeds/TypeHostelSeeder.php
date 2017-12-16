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
        DB::table('tipo_hotel')->insert([
        			'tipo'	=>	'AGENCIA DE VIAJES'
                ]);
        DB::table('tipo_hotel')->insert([
                    'tipo'  =>  'ECO LODGE'
                ]);
		DB::table('tipo_hotel')->insert([
                    'tipo'  =>  'ECOLODGE Y TOUR'
                ]);
        DB::table('tipo_hotel')->insert([
                   'tipo'   =>  'ECO LODGE KAPAWI' 
                ]);	
        DB::table('tipo_hotel')->insert([
                    'tipo'  =>  'HOSTERIA'            
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' =>  'HOTEL'        
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'HOTEL CON PISCINA'          
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'HOTEL DE PRIMERA'          
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'HOTEL TURISTA'          
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'LODGE'            
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'LODGE 4 ESTRE'            
                ]);			
		DB::table('tipo_hotel')->insert([
                    'tipo' => 'LODGE ECONOM'            
                ]);
        DB::table('tipo_hotel')->insert([
                    'tipo' => 'TEST'            
                ]);			
    }
}
