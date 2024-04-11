<?php

namespace App\Api\Countries\Repositories;

use App\Api\Countries\Interfaces\CountryInterface;
use App\Api\Countries\Models\Country;
use Spatie\QueryBuilder\QueryBuilder;

class CountryRepository implements CountryInterface
{
    public function getCountries(): QueryBuilder
    {
        return QueryBuilder::for(Country::class)
            ->allowedFilters([
                'name',
                'code'
            ]);
    }
}
