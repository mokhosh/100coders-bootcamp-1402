<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Address;
use App\Models\Product;
use App\Models\Voucher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         $user = \App\Models\User::factory()->create([
             'email' => 'test@example.com',
         ]);

         Product::factory(10)->create();
         Address::factory(3)->for($user)->create();
         Voucher::factory(10)->create();
    }
}
