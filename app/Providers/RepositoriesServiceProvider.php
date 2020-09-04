<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\MainRepository;

use App\Services\Interfaces\ServiceInterface;
use App\Services\MainService;



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
        $this->app->bind(
            RepositoryInterface::class,
            MainRepository::class
        );
        $this->app->bind(
            ServiceInterface::class,
            MainService::class
        );


        /*
        $this->app->when(ContactController::class)
        ->needs(RepositoryInterface::class)
        ->give(MainRepository::class);

        $this->app->when(CommentController::class)
        ->needs(RepositoryInterface::class)
        ->give(MainRepository::class);
        */
    }
}
