<?php

namespace App\Api\Countries\Interfaces;

use Spatie\QueryBuilder\QueryBuilder;

interface CountryInterface
{
    public function getCountries(): QueryBuilder;
}
