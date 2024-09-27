<?php

use App\Http\Middleware\CheckAdminAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->name('admin.')
                ->group(base_path('routes/dashboard.php'));
            Route::middleware('api')
                ->name('api.')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
            Route::middleware('web')->withoutMiddleware(VerifyCsrfToken::class)
                ->name('ajax.')
                ->prefix('ajax')
                ->group(base_path('routes/ajax.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isAdmin' => CheckAdminAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
