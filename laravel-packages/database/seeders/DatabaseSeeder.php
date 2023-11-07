<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory(10)->create();

         foreach (User::all() as $user) {
             Post::factory(10)->for($user)->create();
         }

         Role::create(['name' => 'admin']);
         Role::create(['name' => 'writer']);
    }
}
