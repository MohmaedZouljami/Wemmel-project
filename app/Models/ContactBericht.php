<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactBericht extends Model
{
    use HasFactory;

    protected $table = 'contact_berichten';

    protected $fillable = [
        'naam',
        'email',
        'onderwerp',
        'bericht',
    ];
}
