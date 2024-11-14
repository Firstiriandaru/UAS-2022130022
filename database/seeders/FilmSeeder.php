<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $filmCount = 5;
        for ($i = 0; $i < $filmCount; $i++) {
            Film::create([
                'image_url' => $faker->imageUrl(640, 480, 'films', true, 'Film'),
                'judulfilm' => $faker->sentence(3),
                'genre' => $faker->word,
                'durasi' => $faker->numberBetween(90, 180),
                'rating' => $faker->randomFloat(1, 1, 10),
                'tanggal_rilis' => $faker->date('Y-m-d', 'now'),
                'tanggal_selesai' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]);
        }
    }
}
