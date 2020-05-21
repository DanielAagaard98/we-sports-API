<?php

namespace App\Providers;

use App\Repositories\EventRepository;
use App\Repositories\Interfaces\EventRepositoryInterface;
use App\Repositories\Interfaces\ParticipantRepositoryInterface;
use App\Repositories\Interfaces\SportRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\ParticipantRepository;
use App\Repositories\SportRepository;
use App\Repositories\UserRepository;
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
        $this->app->bind(
            ParticipantRepositoryInterface::class,
            ParticipantRepository::class
        );
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
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
