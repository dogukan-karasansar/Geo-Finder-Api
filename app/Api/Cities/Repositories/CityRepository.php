<?php

namespace App\Api\Cities\Repositories;

use App\Api\Cities\Interfaces\CityInterface;
use App\Api\Cities\Models\City;
use Spatie\QueryBuilder\QueryBuilder;

class CityRepository implements CityInterface
{
    public function getCities(): QueryBuilder
    {
        return QueryBuilder::for(City::class)
            ->allowedFilters([
                'name',
            ])
            ->allowedIncludes(['country']);
    }
}
