<?php

namespace JsonStringfy\JsonStringfy\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/doclab.php', 'requirements'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/../config/setting.php', 'setting'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/../config/json.php', 'json'
        );
        $this->mergeConfigFrom(
            __DIR__ . '/../config/java.php', 'java'
        );
    }


    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'pdoc');
        $this->publishes([
            __DIR__ . '/../config/doclab.php' => config_path('requirements.php'),
        ], 'installerConfig');
    }
}
