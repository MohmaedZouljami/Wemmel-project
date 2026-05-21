<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'image',
        'category',
        'published_at',
        'user_id',
    ];

    public function gebruiker()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
