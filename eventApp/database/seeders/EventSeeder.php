<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $userIds = User::pluck('id')->toArray(); // Fetch all valid user IDs

        for ($i = 1; $i <= 30; $i++) {
            Event::create([
                'event_name' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'event_date' => $faker->dateTimeBetween('now', '+1 year'),
                'location' => $faker->city,
                'user_id' => $faker->randomElement($userIds), // Assign a valid user_id
            ]);
        }
    }
}
