<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $dataStreamLol = 'database/schema/seeded_db_initial.dump';
        DB::unprepared(file_get_contents($dataStreamLol));
    }
}
