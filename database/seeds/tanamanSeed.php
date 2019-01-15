<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class tanamanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tanaman')->insert([
    		'nama' => 'Cabai',
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

    	DB::table('tanaman')->insert([
    		'nama' => 'Bawang',
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);
    }
}
