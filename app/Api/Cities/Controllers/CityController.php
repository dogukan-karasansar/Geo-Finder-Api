<?php

namespace App\Api\Cities\Controllers;

use App\Api\Cities\Interfaces\CityInterface;
use App\Api\Cities\Models\City;
use App\Api\Cities\Resources\CityResource;
use App\Api\Countries\Resources\CountryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected CityInterface $cityInterface;

    public function __construct(CityInterface $cityInterface)
    {
        $this->cityInterface = $cityInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $cities = $this->cityInterface
            ->getCities()
            ->paginate(request()->integer('per_page') ?? 10);

        return CityResource::collection($cities);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
