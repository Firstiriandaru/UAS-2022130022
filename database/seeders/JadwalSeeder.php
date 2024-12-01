<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Film;
use App\Models\Studio;
use Faker\Factory as Faker;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $filmIds = Film::pluck('film_id')->toArray();
        $studioIds = Studio::pluck('studio_id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            Jadwal::create([
                'film_id' => $faker->randomElement($filmIds),
                'studio_id' => $faker->randomElement($studioIds),
                'tanggal_penayangan' => $faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
                'waktu_mulai' => $faker->time('H:i:s'),
                'waktu_selesai' => $faker->time('H:i:s'),
            ]);
        }
    }
}
