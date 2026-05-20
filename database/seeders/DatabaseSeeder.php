<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'mohamed',
            'email' => 'mohamed@zouljami.com',
            'password' => '$12$yeNmMlzPmK.9TIeLj4odCeklAe9JEDVLo0Sk6WLkwdRKeoS2A56.C',
        ]);
        \App\Models\User::factory(50)->create();
        \App\Models\News::factory(10)->create();
    }
}

