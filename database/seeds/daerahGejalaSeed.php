<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class daerahGejalaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'akar',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'batang',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);  
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'Daun',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);   
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'buah/umbi',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'bunga',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('daerahgejala')->insert([
        	'daerah_gejala' => 'biji',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);        
    }
}