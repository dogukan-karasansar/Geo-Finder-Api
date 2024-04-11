<?php

namespace App\Api\Countries\Controllers;

use App\Api\Countries\Interfaces\CountryInterface;
use App\Api\Countries\Resources\CountryResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected CountryInterface $countryInterface;

    public function __construct(CountryInterface $countryInterface)
    {
        $this->countryInterface = $countryInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = $this->countryInterface
            ->getCountries()
            ->get();

        return CountryResource::collection($countries);
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
