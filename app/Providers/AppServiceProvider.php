<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // $lr('about') resolves to /pt/about when the current locale is pt and a
        // pt.about route exists, otherwise falls back to the unprefixed route('about').
        View::share('lr', function (string $name, array $params = []): string {
            $localized = app()->getLocale() === 'pt' ? 'pt.'.$name : $name;
            if (Route::has($localized)) {
                return route($localized, $params);
            }

            return route($name, $params);
        });
    }
}
