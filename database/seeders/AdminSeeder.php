<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin User
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), //password is '12345678'
            'user_type' => 1,
        ]);

        // Default User
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), //password is '12345678'
            'user_type' => 0,
        ]);
    }
}
