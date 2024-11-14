<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Studio;
use Faker\Factory as Faker;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $studioCount = 5;

        for ($i = 0; $i < $studioCount; $i++) {
            Studio::create([
                'studio_name' => 'Studio ' . ($i + 1),
                'kapasitas' => $faker->numberBetween(50, 200),
            ]);
        }
    }
}
