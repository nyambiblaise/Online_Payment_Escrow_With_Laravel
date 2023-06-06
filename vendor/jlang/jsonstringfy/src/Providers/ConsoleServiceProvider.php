<?php

namespace JsonStringfy\JsonStringfy\Providers;

use JsonStringfy\JsonStringfy\Console\Commands\GetDocConfig;
use JsonStringfy\JsonStringfy\Console\Commands\RemoveDocConfig;
use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                GetDocConfig::class,
                RemoveDocConfig::class
            ]);
        }
    }
}
