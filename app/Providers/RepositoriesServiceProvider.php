<?php

namespace App\Providers;

use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ContactRepositoryInterface::class, ContactRepository::class);
    }
}
