<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    use HasFactory;

    protected $table = 'nieuws';

    protected $fillable = [
        'titel',
        'inhoud',
        'afbeelding',
        'categorie',
        'gepubliceerd_op',
        'user_id',
    ];

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
