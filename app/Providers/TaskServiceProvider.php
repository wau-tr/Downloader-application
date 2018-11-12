<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\TaskService;

class TaskServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TaskService::class, function() {
            return new TaskService();
        });
    }
}
