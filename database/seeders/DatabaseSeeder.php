<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Animal;
use App\Models\Spesies;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Murtaki',
            'email' => 'laravel1010@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Spesies::factory(6)->create();
        Animal::factory(50)->create();
    }
}
