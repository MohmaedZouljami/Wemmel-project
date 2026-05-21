<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'mohamed',
            'email' => 'mohamed@zouljami.com',
            'password' => Hash::make('password'),
            'is_admin' => false,
        ]);

        $this->call([
            NewsSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
