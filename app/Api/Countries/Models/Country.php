<?php

namespace App\Api\Countries\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'code',
        'call_code',
        'currency',
        'north',
        'south',
        'east',
        'west',
        'capital',
    ];
    
}
