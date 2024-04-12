<?php

namespace App\Api\Countries\Models;

use App\Api\Cities\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function cities(): HasMany
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

}
