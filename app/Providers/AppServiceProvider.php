<?php

namespace App\Providers;

use App\Contracts\IAuthRepository;
use App\Contracts\IDentalRepository;
use App\Contracts\IPersonRepository;
use App\Contracts\IPetRepository;
use App\Repositories\AuthRepository;
use App\Repositories\DentalRepository;
use App\Repositories\PersonRepository;
use App\Repositories\PetRepository;
use Illuminate\Routing\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IPetRepository::class, PetRepository::class);
        $this->app->bind(IPersonRepository::class, PersonRepository::class);
        $this->app->bind(IAuthRepository::class, AuthRepository::class);
        $this->app->bind(IDentalRepository::class, DentalRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
