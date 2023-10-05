<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Mo Khosh',
             'email' => 'mskhoshnazar@gmail.com',
             'password' => Hash::make('1234567890'),
             'title' => 'Mo Khosh',
             'username' => 'mokhosh',
         ]);

         \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@gmail.com',
             'password' => Hash::make('1234567890'),
             'title' => 'Test Blog',
             'username' => 'test-blog',
         ]);
    }
}
