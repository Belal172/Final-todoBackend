<?php

namespace App\Providers;

use App\Interfaces\TodoInterface;
use App\repositories\TodoRepository;
use Illuminate\Support\ServiceProvider;

class TodoServicceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TodoInterface::class ,TodoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
