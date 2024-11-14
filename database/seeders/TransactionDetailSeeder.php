<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\Jadwal;
use Faker\Factory as Faker;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $headerIds = TransactionHeader::pluck('id')->toArray();
        $jadwalIds = Jadwal::pluck('jadwal_id')->toArray();
        $detailCount = 30;

        for ($i = 0; $i < $detailCount; $i++) {
            TransactionDetail::create([
                'TransactionHeaderId' => $faker->randomElement($headerIds),
                'jadwal_id' => $faker->randomElement($jadwalIds),
                'quantity' => $faker->numberBetween(1, 5),
            ]);
        }
    }
}
