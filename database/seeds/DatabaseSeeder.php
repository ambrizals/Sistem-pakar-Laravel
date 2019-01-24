<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeed::class);
        $this->call(tanamanSeed::class);
        $this->call(daerahGejalaSeed::class);
        $this->call(gejalaSeed::class);
        $this->call(PenyakitSeed::class);
    }
}
