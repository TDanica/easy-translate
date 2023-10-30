<?php

namespace App\Providers;

use App\Repositories\Converions\ConversionRepository;
use App\Repositories\Conversions\Interfaces\ConversionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ConversionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ConversionRepositoryInterface::class, ConversionRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
