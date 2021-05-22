<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Animal;
use Illuminate\Support\Str;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uuid = Str::orderedUuid()->toString();
        $animal = new Animal;
        $slug = $animal->createSlug($uuid);
        $animal->factory()
            ->count(1)
            ->create([
                'pet_name'  => $slug,
                'slug'      => $slug
                ]);
    }
}
