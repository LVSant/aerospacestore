<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AeronavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

		$now = Carbon::now();
		
		$usableDate = $now->format('m-d-Y');
		
		//$usableDate = Carbon::createFromFormat('d-m-Y', $now);

         DB::table('aeronaves')->insert([
            'modelo' => 'Airbus A321',
            'descricao' => 'Avião a jato comercial, com capacidade de até 170 PAX',
            'ano' => '2009',
            'valor' => '140000000',
            'link_img' => 'http://fs151.www.ex.ua/show/152053256/152053256.jpg',
            'tipomotor' => 'jato',
            'numeromotor' => 'bimotor',
            'user_id' => '1'
            

        ]);

         DB::table('aeronaves')->insert([
            'modelo' => 'Cessna 172s',
            'descricao' => 'Avião monomotor com capacidade para ate 3 PAX',
            'ano' => '1995',
            'valor' => '50000',
            'link_img' => 'https://upload.wikimedia.org/wikipedia/commons/6/6b/Cessna.f172g.g-bgmp.arp.jpg',
            'tipomotor' => 'helice',
            'numeromotor' => 'monomotor',
            'user_id' => '1'
            
            
        ]);

              DB::table('aeronaves')->insert([
            'modelo' => 'Boeing 737-8',
            'descricao' => 'Avião a jato comercial, com capacidade de ate 180 PAX',
            'ano' => '2011',
            'valor' => '86000000',
            'link_img' => 'http://aeroaffaires.com/static/aa-images/BBJ_737_ext.jpg' ,
            'tipomotor' => 'jato',
            'numeromotor' => 'bimotor',
            'user_id' => '1'
            
           
        ]);

       DB::table('aeronaves')->insert([
            'modelo' => 'EMB 120',
            'descricao' => 'Avião bimotor turboprop com capacidade para ate 10 PAX',
            'ano' => '1995',
            'valor' => '200000',
            'link_img' => 'http://i233.photobucket.com/albums/ee140/varigbrasil/EMB120.jpg',
            'tipomotor' => 'helice',
            'numeromotor' => 'bimotor',
            'user_id' => '1'
            
            
        ]);
              DB::table('aeronaves')->insert([
            'modelo' => 'Embraer Legacy 500',
            'descricao' => 'Avião particular a jato, com capacidade para ate 20 PAX',
            'ano' => '2014',
            'valor' => '30000000',
            'link_img' => 'http://www.embraerexecutivejets.com/Ambientaes/Legacy-500-corporate-jet-Overview.jpg',
            'tipomotor' => 'jato',
            'numeromotor' => 'bimotor',
            'user_id' => '1'
                        
        ]);
        
        DB::table('aeronaves')->insert([
            'modelo' => 'KingAir 350i',
            'descricao' => 'Avião bimotor turboprop com capacidade para ate 8 PAX',
            'ano' => '2012',
            'valor' => '5000000',
            'link_img' => 'http://media.usjetways.com/usjet/image/data/Product%20Images/Turboprops/King%20Air%20350/King_Air_350i_ext.jpg',
            'tipomotor' => 'helice',
            'numeromotor' => 'bimotor',
            'user_id' => '1'
                        
        ]);



    }
}
