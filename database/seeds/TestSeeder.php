<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<100;$i++){
	        \DB::table('test')->insert([
	        	'nama'=>str_random(20),
	        	'harga'=>rand(1,10000),
	        ]);
        }
    }
}
