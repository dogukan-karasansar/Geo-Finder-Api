<?php

namespace App\Api\Cities\Models;

use App\Api\Countries\Models\Country;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'country_id',
        'name',
        'lat',
        'lng'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    public function scopeSearchByCountryName(Builder $query, string $name): Builder
    {
        return $query->whereHas('country', function ($query) use ($name) {
            return $query->whereRaw('LOWER("name") LIKE ?', ['%' . strtolower($name) . '%']);
        });
    }
}
