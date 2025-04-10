<?php

use App\Http\Middleware\AdminRole;
use App\Http\Middleware\UserRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //  $middleware->append(UserRole::class);
        //   $middleware->alias([
        //     'user-role' => \App\Http\Middleware\RoleCheck::class,
        // ]);
        $middleware->alias([
            'check-user' => UserRole::class,
            'check-admin' => AdminRole::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
