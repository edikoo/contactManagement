<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Interfaces
use App\Repositories\Interfaces\IqueryableRepositoryInterface;

//Repositories
use App\Repositories\ContactRepository;
use App\Repositories\CommentRepository;

//Controllers
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CommentController;

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
        $this->app->when(ContactController::class)
        ->needs(IqueryableRepositoryInterface::class)
        ->give(ContactRepository::class);

        $this->app->when(CommentController::class)
        ->needs(IqueryableRepositoryInterface::class)
        ->give(CommentRepository::class);
    }
}
