<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "User$i",
                'email' => "user$i@example.com",
                'password' => bcrypt('password'), // Default password
            ]);
        }
    }
}
