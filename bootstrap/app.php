<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(function ($router) {
        $router->group(['middleware' => 'web'], function($router) {
            require __DIR__.'/../routes/web.php';
        });
        $router->group(['middleware' => 'api'], function($router) {
            require __DIR__.'/../routes/api.php';
        });
        $router->get('/up', function () {
            return 'UP';
        })->name('health');
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias('ceklevel', \App\Http\Middleware\CekLevel::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
