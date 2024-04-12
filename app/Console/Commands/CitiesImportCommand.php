<?php

namespace App\Console\Commands;

use App\Api\Countries\Models\Country;
use App\JsonDecoderTrait;
use Illuminate\Console\Command;

class CitiesImportCommand extends Command
{
    use JsonDecoderTrait;

    protected $citiesFile = '/public/jsons/country-by-cities.json';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:cities-import-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cities Import Command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = $this->decodeJson($this->citiesFile);

        collect($data)->map(function ($item) {
            $country = Country::firstOrCreate(['name' => $item['country']]);
            $cities = $item['cities'];
            foreach ($cities as $key => $value) {
                $country->cities()->create([
                    'name' => $value
                ]);
            }
        });
    }
}
