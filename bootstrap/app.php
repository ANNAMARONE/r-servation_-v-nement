<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Application;
use App\Http\Middleware\StorePreviousUrl;
use App\Http\Middleware\EnsureUserHasRole;
use App\Http\Middleware\OrganismeMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware ->alias([
             'role'=> EnsureUserHasRole::class,
             'admin'=> AdminMiddleware::class,
             'organisme'=> OrganismeMiddleware::class,
             'utilisateur'=> UserMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
