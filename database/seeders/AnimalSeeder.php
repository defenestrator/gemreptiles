<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;
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
        $uuid = Str::orderedUuid();
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
