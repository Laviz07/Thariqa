<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\isAdmin::class,
            'isMember' => \App\Http\Middleware\isMember::class,
            'isAdminOrMember' => \App\Http\Middleware\IsAdminOrMember::class
        ]);

        $middleware->trustProxies(['*']);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
