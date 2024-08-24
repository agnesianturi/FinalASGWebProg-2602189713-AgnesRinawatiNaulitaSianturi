<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');

        for ($i=0; $i < 20; $i++) { 
            DB::table('friendships')->insert([
                'user_id' => $faker->numberBetween(1,20),
                'friend_id' => $faker->numberBetween(1,20),
            ]);
        }
    }
}
