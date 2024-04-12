<?php

namespace App\Api\Cities\Resources;

use App\Api\Countries\Resources\CountryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'country' => new CountryResource($this->country),
            'geo_cordinate' => [
                'lat' => $this->lat,
                'lng' => $this->lng,
            ]
        ];
    }
}
