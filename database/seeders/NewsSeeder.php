<?php

namespace Database\Seeders;

use App\Models\Nieuws;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        Nieuws::create(['title' => 'Gemeentelijk zwembad heropent', 'content' => 'Het gemeentelijk zwembad van Wemmel heropent op 1 juni. Iedereen is welkom!', 'category' => 'Sport', 'published_at' => now()]);
        Nieuws::create(['title' => 'Nieuwe fietsroute in Wemmel', 'content' => 'Er is een nieuwe fietsroute aangelegd doorheen het centrum van Wemmel.', 'category' => 'Mobiliteit', 'published_at' => now()]);
        Nieuws::create(['title' => 'Gemeentefeest 2026', 'content' => 'Op 21 juli viert Wemmel het gemeentefeest op het marktplein.', 'category' => 'Evenementen', 'published_at' => now()]);
        Nieuws::create(['title' => 'Nieuwe bibliotheek geopend', 'content' => 'De nieuwe bibliotheek van Wemmel is geopend. Kom langs en ontdek ons aanbod!', 'category' => 'Cultuur', 'published_at' => now()]);
        Nieuws::create(['title' => 'Wegenwerken centrum', 'content' => 'Vanaf juni starten wegenwerken in het centrum van Wemmel. Houd rekening met verkeershinder.', 'category' => 'Infrastructuur', 'published_at' => now()]);        Nieuws::create(['title' => 'Zomerkampen 2026', 'content' => 'Inschrijvingen voor de zomerkampen 2026 zijn geopend. Schrijf uw kind nu in!', 'category' => 'Jeugd', 'published_at' => now()]);
    }
}
