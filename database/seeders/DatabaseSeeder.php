<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\SpeciesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            SpeciesSeeder::class,
            UserSeeder::class,
        ]);


    }
}
