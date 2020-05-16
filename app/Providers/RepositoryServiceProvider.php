<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\SportRepositoryInterface;
use App\Repositories\SportRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            EventRepositoryInterface::class,
            EventRepository::class
        );
        $this->app->bind(
            SportRepositoryInterface::class,
            SportRepository::class
        );
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
