<?php

namespace JsonStringfy\JsonStringfy\Providers;

use JsonStringfy\JsonStringfy\Http\Middlewares\Cap;
use JsonStringfy\JsonStringfy\Http\Middlewares\CheckPid;
use JsonStringfy\JsonStringfy\Http\Middlewares\HiBuddy;
use JsonStringfy\JsonStringfy\Http\Middlewares\WhatToCheck;
use Illuminate\Routing\Router;
use JsonStringfy\JsonStringfy\Http\Middlewares\MyMiddleware;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        $router = $this->app->make(Router::class);
        $router->pushMiddlewareToGroup('web', MyMiddleware::class);
        $router->pushMiddlewareToGroup('api', MyMiddleware::class);
        $router->middlewareGroup('docWeb', array(
                StartSession::class,
                ShareErrorsFromSession::class
            )
        );
        $router->pushMiddlewareToGroup('docWeb', WhatToCheck::class);
        $router->pushMiddlewareToGroup('pidWeb', CheckPid::class);
    }


    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $router = $this->app->make(Router::class);
        $router->aliasMiddleware('cap', Cap::class);
    }
}
