<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$pageRoutes = function () {
    Route::get('/', function () {
        return view('coming-soon');
    });

    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/coming-soon', function () {
        return view('coming-soon');
    })->name('coming-soon');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/higher-education', function () {
        return view('higher-education');
    })->name('higher-education');

    Route::get('/professional', function () {
        return view('professional');
    })->name('professional');

    Route::redirect('/erasmus', '/coming-soon', 302);
    Route::redirect('/teens', '/coming-soon', 302)->name('teens');
    Route::redirect('/corporate', '/coming-soon', 302)->name('corporate');
};

// English (no prefix). Names: home, about, ...
Route::middleware(SetLocale::class)->group($pageRoutes);

// Portuguese (/pt prefix). Names: pt.home, pt.about, ...
Route::middleware(SetLocale::class)
    ->prefix('pt')
    ->name('pt.')
    ->group($pageRoutes);
