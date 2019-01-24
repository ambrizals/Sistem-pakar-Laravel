<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class gejalaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * [tanaman] Cabai = 1, Bawang = 2
     * [daerah_gejala] Akar = 1, Batang = 2, Daun = 3, Buah/Umbi = 4, Bunga = 5, Biji = 6
     */
    public function run()
    {
        DB::table('gejala')->insert([
        	'tanaman' => 2,
        	'daerah_gejala' => 2,
        	'nama_gejala' => 'Pangkal batang menunjukkan bekas gigitan ulat',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('gejala')->insert([
        	'tanaman' => 2,
        	'daerah_gejala' => 2,
        	'nama_gejala' => 'Pangkai batang terpotong - potong',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);   
        DB::table('gejala')->insert([
        	'tanaman' => 2,
        	'daerah_gejala' => 2,
        	'nama_gejala' => 'Batang Rebah',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
        DB::table('gejala')->insert([
        	'tanaman' => 2,
        	'daerah_gejala' => 2,
        	'nama_gejala' => 'Batang Rusak dan Berceceran',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);                        
    }
}
