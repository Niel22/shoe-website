<?php

use App\Http\Middleware\AdminDevice;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin' => AdminMiddleware::class,
            'admin_device' => AdminDevice::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    $app->register(\Barryvdh\DomPDF\ServiceProvider::class);
    return $app;
