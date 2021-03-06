<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Corvus\Core\Repositories\Pricing\PricingRepositoryInterface;
use Corvus\Core\Repositories\Pricing\PricingRepository;

use Corvus\Core\Repositories\EloquentRepositoryInterface;
use Corvus\Core\Repositories\BaseRepository;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(PricingRepositoryInterface::class, PricingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
