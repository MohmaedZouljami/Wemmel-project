<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaar extends Model
{
    use HasFactory;

    protected $table = 'commentaren';

    protected $fillable = [
        'inhoud',
        'user_id',
        'news_id',
    ];

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function nieuws()
    {
        return $this->belongsTo(Nieuws::class, 'news_id');
    }
}
