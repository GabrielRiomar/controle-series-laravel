<?php

namespace App\Providers;

use App\Repositories\EloquentEpisodesRepository;
use App\Repositories\EpisodesRepository;
use Illuminate\Support\ServiceProvider;

class EpisodesRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EpisodesRepository::class, EloquentEpisodesRepository::class);
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
