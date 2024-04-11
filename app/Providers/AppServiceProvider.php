<?php

namespace App\Providers;

use App\Api\Countries\Interfaces\CountryInterface;
use App\Api\Countries\Repositories\CountryRepository;
use App\Api\Countries\Resources\CountryResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CountryInterface::class, CountryRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        CountryResource::withoutWrapping();
    }
}
