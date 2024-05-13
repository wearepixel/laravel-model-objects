<?php

namespace WeArePixel\LaravelModelObjects;

use Illuminate\Support\ServiceProvider;

class LaravelModelObjectsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('laravel-model-objects.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-model-objects');

        $this->app->singleton('laravel-model-objects', function () {
            return new LaravelModelObjects();
        });
    }
}
