<?php

namespace Database\Seeders;

use App\Models\Nieuws;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        Nieuws::create([
            'title' => 'Gemeentelijk zwembad heropent',
            'content' => 'Het gemeentelijk zwembad van Wemmel heropent op 1 juni. Iedereen is welkom!',
            'category' => 'Sport',
            'published_at' => now(),
        ]);

        Nieuws::create([
            'title' => 'Nieuwe fietsroute in Wemmel',
            'content' => 'Er is een nieuwe fietsroute aangelegd doorheen het centrum van Wemmel.',
            'category' => 'Mobiliteit',
            'published_at' => now(),
        ]);

        Nieuws::create([
            'title' => 'Gemeentefeest 2026',
            'content' => 'Op 21 juli viert Wemmel het gemeentefeest op het marktplein.',
            'category' => 'Evenementen',
            'published_at' => now(),
        ]);
    }
}
