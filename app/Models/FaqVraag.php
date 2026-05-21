<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqVraag extends Model
{
    use HasFactory;

    protected $table = 'faq_vragen';

    protected $fillable = [
        'vraag',
        'antwoord',
        'faq_categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(FaqCategorie::class, 'faq_categorie_id');
    }
}
