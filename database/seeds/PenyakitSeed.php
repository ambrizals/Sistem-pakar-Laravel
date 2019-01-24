<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PenyakitSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penyakit')->insert([
        	'tanaman' => 2,
        	'nama_penyakit' => 'Penyakit Trotol, Bercak Ungu (Purple blotch)',
        	'kulturteknis' => '',
        	'fisikmekanis' => 'Pencelupan bibit umbi maksimal 3 menit dalam larutan agens hayati 
Pseudomonas fluorescens (Pf) dosis 1 ml/l air dengan kepadatan populasi ??? 
109.',
			'kimiawi' => 'Jika ambang pengendalian bercak ungu telah mencapai (AP penyakit 
bercak ungu adalah jika kerusakan daun sebesar 10 % pertanaman contoh) 
lakukan penyemprotan dengan fungisida efektif yang terdaftar dan diizinkan 
oleh Menteri Pertanian, seperti : Agrokol 70 WP, Alterna 90 WP, Bazoka 
450 SC, Daconil 500 F, Fitozeb 80 WP, Nustar 400 EC, Oktanil 75 WP, 
Promidon 50 WP, Solid 60 WP, Tonikur 250 EC, Tropicol 82 WP, Ziflo 76 
WG dan lain-lain. Adapun waktu penyemprotan paling baik sore hari. ',
			'hayati' => '',
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now()
        ]);
    }
}
