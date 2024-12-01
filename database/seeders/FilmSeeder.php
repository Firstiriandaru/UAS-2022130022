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
        $films = [
            ['name' => 'The Batman', 'image' => 'storage/Poster Bioskop/The Batman.png', 'genre' => 'Action'],
            ['name' => 'Conjuring', 'image' => 'storage/Poster Bioskop/Conjuring.jpg', 'genre' => 'Horror'],
            ['name' => 'Inception', 'image' => 'storage/Poster Bioskop/Inception.jpg', 'genre' => 'Action'],
            ['name' => 'Indiana Jones', 'image' => 'storage/Poster Bioskop/Indiana Jones.jpg', 'genre' => 'Adventure'],
            ['name' => 'IT', 'image' => 'storage/Poster Bioskop/IT.jpg', 'genre' => 'Horror'],
            ['name' => 'John Wick', 'image' => 'storage/Poster Bioskop/John Wick.jpg', 'genre' => 'Action'],
            ['name' => 'La La Land', 'image' => 'storage/Poster Bioskop/La La Land.jpg', 'genre' => 'Romantic'],
            ['name' => 'Mad Max', 'image' => 'storage/Poster Bioskop/Mad Max.jpg', 'genre' => 'Action'],
            ['name' => 'Pirates of The Caribbean', 'image' => 'storage/Poster Bioskop/Pirates of The Caribbean.jpg', 'genre' => 'Adventure'],
            ['name' => 'Pride and Prejudice', 'image' => 'storage/Poster Bioskop/Pride Prejudice.jpg', 'genre' => 'Romantic'],
            ['name' => 'The Dark Knight', 'image' => 'storage/Poster Bioskop/The Dark Knight.jpg', 'genre' => 'Action'],
        ];

        $faker = Faker::create();

        foreach ($films as $film) {
            Film::create([
                'image_url' => $film['image'],
                'judulfilm' => $film['name'],
                'genre' => $film['genre'],
                'durasi' => $faker->numberBetween(90, 180),
                'rating' => $faker->randomFloat(1, 1, 10),
                'tanggal_rilis' => $faker->date('Y-m-d', 'now'),
                'tanggal_selesai' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            ]);
        }

        // $faker = Faker::create();

        // $filmCount = 10;
        // for ($i = 0; $i < $filmCount; $i++) {
        //     Film::create([
        //         'image_url' => $faker->imageUrl(640, 480, 'films', true, 'Film'),
        //         'judulfilm' => $faker->sentence(3),
        //         'genre' => $faker->word,
        //         'durasi' => $faker->numberBetween(90, 180),
        //         'rating' => $faker->randomFloat(1, 1, 10),
        //         'tanggal_rilis' => $faker->date('Y-m-d', 'now'),
        //         'tanggal_selesai' => $faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
        //     ]);
        // }
    }
}
