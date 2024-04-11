<?php

namespace App\Api\Countries\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
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
            'code' => $this->code,
            'call_code' => $this->call_code,
            'currency' => $this->currency,
            'geo_cordinate' => [
                'west' => $this->west,
                'north' => $this->north,
                'east' => $this->east,
                'south' => $this->south
            ]
        ];
    }
}
