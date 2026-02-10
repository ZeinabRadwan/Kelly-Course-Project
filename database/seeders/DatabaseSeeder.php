<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Creating the Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@nohacademy.com',
            'password' => Hash::make('password123'),  
            'role' => 'admin',  
        ]);
        // Creating the Student user
        User::create([
            'name' => 'Student User',
            'email' => 'student@nohacademy.com',
            'password' => Hash::make('password123'),  
            'role' => 'student',  
        ]);
        // Creating the Instructor user
        User::create([
            'name' => 'Instructor User',
            'email' => 'instructor@nohacademy.com',
            'password' => Hash::make('password123'),
            'role' => 'instructor',
        ]);
    }
}
