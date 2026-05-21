<?php

namespace Database\Seeders;

use App\Models\FaqCategorie;
use App\Models\FaqVraag;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $categorie1 = FaqCategorie::create(['naam' => 'Parkeren']);
        FaqVraag::create([
            'vraag' => 'Waar kan ik parkeren in Wemmel?',
            'antwoord' => 'Er zijn gratis parkeerplaatsen beschikbaar aan het gemeentehuis en het marktplein.',
            'faq_categorie_id' => $categorie1->id,
        ]);
        FaqVraag::create([
            'vraag' => 'Is parkeren gratis in het centrum?',
            'antwoord' => 'Ja, parkeren in het centrum van Wemmel is gratis voor de eerste 2 uur.',
            'faq_categorie_id' => $categorie1->id,
        ]);

        $categorie2 = FaqCategorie::create(['naam' => 'Afval']);
        FaqVraag::create([
            'vraag' => 'Wanneer wordt het afval opgehaald?',
            'antwoord' => 'Restafval wordt elke twee weken opgehaald. PMD wekelijks.',
            'faq_categorie_id' => $categorie2->id,
        ]);

        $categorie3 = FaqCategorie::create(['naam' => 'Gemeentehuis']);
        FaqVraag::create([
            'vraag' => 'Wat zijn de openingsuren van het gemeentehuis?',
            'antwoord' => 'Het gemeentehuis is open van maandag tot vrijdag van 9u tot 12u en van 14u tot 16u.',
            'faq_categorie_id' => $categorie3->id,
        ]);
    }
}
