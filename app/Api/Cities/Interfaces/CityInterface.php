<?php

namespace App\Api\Cities\Interfaces;

use Spatie\QueryBuilder\QueryBuilder;

interface CityInterface
{
    public function getCities(): QueryBuilder;
}
