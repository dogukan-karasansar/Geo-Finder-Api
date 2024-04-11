<?php

namespace App\Console\Commands;

use App\Api\Countries\Models\Country;
use App\JsonDecoderTrait;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Type\Decimal;

class CountriesImportCommand extends Command
{

    use JsonDecoderTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:countries-import-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'countries import command';

    protected $countryFile = '/public/jsons/country-by-name.json';
    protected $countryGeoFile = '/public/jsons/country-by-geo-coordinates.json';

    public function geoFindByName(string $name): array
    {
        $countriesByGeo = $this->decodeJson($this->countryGeoFile);
        return collect($countriesByGeo)
            ->filter(fn ($item) => $item['country'] === $name)
            ->first() ?? [
                'north' => '',
                'west' => '',
                'south' => '',
                'east' => ''
            ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->decodeJson($this->countryFile);

        collect($data)->map(function ($item) {
            $name = $item['country'];
            $geo = $this->geoFindByName($name);
            $data =  [
                'name' => $name,
                'north' => (float) $geo['north'],
                'west' => (float) $geo['west'],
                'south' =>(float) $geo['south'],
                'east' => (float) $geo['east']
            ];

            Country::create($data);
        });
    }
}
