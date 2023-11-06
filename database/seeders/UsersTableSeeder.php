<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Add an admin user
         User::create([
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => Hash::make('adminpassword'),
            'role' => 'admin',
        ]);

        // Add normal user
        $faker = Faker::create();

        User::create([
            'name' => 'User',
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('userpassword'),
            'role' => 'normal',
        ]);
    }
}
