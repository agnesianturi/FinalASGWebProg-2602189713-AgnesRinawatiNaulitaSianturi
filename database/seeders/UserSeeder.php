<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Faker\Factory as Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('en_EN');

        for ($i = 0; $i < 20; $i++){
            DB::table('users')->insert([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make('befriend'),
                'age' => rand(17, 70),
                'gender' => $faker->randomElement($array = ['Male', 'Female']),
                'linkedinUsername' => 'https://www.linkedin.com/in/'.$faker->name(),
                'mobileNumber' => $faker->phoneNumber(),
                'fieldsOfWork' => json_encode(Arr::random(['Business & Management', 'Food & Beverages', 'Science & Technology', 'Education', 'Entertainment & Arts', 'Law & Politic', 'Finance & Consulting'], 3)),
                'registerPrice' => rand(100000,125000),
                'paymentStatus' => 1,
                'photo' => 'images/'.$faker->numberBetween(1,5).'.png',
            ]);
        }
    }
}
