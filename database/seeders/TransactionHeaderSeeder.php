<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionHeader;
use App\Models\User;
use Faker\Factory as Faker;

class TransactionHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray();
        $transactionCount = 15;

        for ($i = 0; $i < $transactionCount; $i++) {
            TransactionHeader::create([
                'user_id' => $faker->randomElement($userIds),
            ]);
        }
    }
}
