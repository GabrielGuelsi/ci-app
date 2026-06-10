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

    Route::get('/higher-education', function () {
        return view('higher-education');
    })->name('higher-education');

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
    Route::redirect('/study-in-ireland', '/higher-education', 301);
    Route::redirect('/already-in-ireland', '/higher-education', 301);
    Route::redirect('/professional', '/career-bridge', 301);
    Route::redirect('/corporate', '/for-employers', 301);
    Route::redirect('/erasmus', '/higher-education', 301);
    Route::redirect('/teens', '/higher-education', 301);
};

Route::middleware(SetLocale::class)->group($pageRoutes);

Route::middleware(SetLocale::class)
    ->prefix('pt')
    ->name('pt.')
    ->group($pageRoutes);
