<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         DB::table('users')->insert([
            'name' => 'Leonardo',
            'email' => 'leonardoviveirossantos@gmail.com',
            'tipo' => 'J',
            'password' => bcrypt('secret'),
        ]);

    	$this->call(AeronavesTableSeeder::class);

        
    
    }
}
