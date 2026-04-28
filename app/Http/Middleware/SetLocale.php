<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    private const SUPPORTED = ['en', 'pt'];

    private const COOKIE = 'locale';

    public function handle(Request $request, Closure $next): Response
    {
        $route = $request->route();
        $routeName = $route ? (string) $route->getName() : '';
        $isPtRoute = str_starts_with($routeName, 'pt.') || $routeName === 'pt';

        $fromUrl = $isPtRoute ? 'pt' : ($routeName !== '' ? 'en' : null);
        $locale = $fromUrl
            ?: $request->cookie(self::COOKIE)
            ?: config('app.locale');

        if (! in_array($locale, self::SUPPORTED, true)) {
            $locale = 'en';
        }

        app()->setLocale($locale);

        if ($fromUrl) {
            Cookie::queue(self::COOKIE, $locale, 60 * 24 * 365);
        }

        return $next($request);
    }
}
