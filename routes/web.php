<?php

use App\Http\Controllers\AssessmentLeadController;
use App\Http\Controllers\ProfileAssessmentController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$pageRoutes = function () {
    Route::get('/', function () {
        return view('coming-soon');
    })->name('home');

    Route::get('/home', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/study-in-ireland', function () {
        return view('study-in-ireland');
    })->name('study-in-ireland');

    Route::get('/already-in-ireland', function () {
        return view('already-in-ireland');
    })->name('already-in-ireland');

    Route::get('/career-bridge', function () {
        return view('career-bridge');
    })->name('career-bridge');

    Route::get('/for-employers', function () {
        return view('for-employers');
    })->name('for-employers');

    Route::get('/why-ci-ireland', function () {
        return view('why-ci-ireland');
    })->name('why-ci-ireland');

    Route::get('/start-your-plan', function () {
        return view('start-your-plan');
    })->name('start-your-plan');

    Route::post('/start-your-plan', [ProfileAssessmentController::class, 'store'])
        ->name('start-your-plan.store');

    Route::post('/assessment-lead', [AssessmentLeadController::class, 'store'])
        ->name('assessment-lead.store');

    Route::redirect('/about', '/why-ci-ireland', 301);
    Route::redirect('/higher-education', '/study-in-ireland', 301);
    Route::redirect('/professional', '/career-bridge', 301);
    Route::redirect('/corporate', '/for-employers', 301);
    Route::redirect('/erasmus', '/study-in-ireland', 301);
    Route::redirect('/teens', '/study-in-ireland', 301);
};

Route::middleware(SetLocale::class)->group($pageRoutes);

Route::middleware(SetLocale::class)
    ->prefix('pt')
    ->name('pt.')
    ->group($pageRoutes);
