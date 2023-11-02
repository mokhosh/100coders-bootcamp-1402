<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Mo Khosh',
             'email' => 'mskhoshnazar@gmail.com',
             'password' => Hash::make('1234567890'),
         ]);

        $this->call(ArticleSeeder::class);
    }
}
