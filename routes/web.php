<?php

use App\Http\Controllers\AssessmentLeadController;
use App\Http\Controllers\ProfileAssessmentController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

$pageRoutes = function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::redirect('/home', '/')->name('welcome');

    Route::get('/higher-education', function () {
        return view('higher-education');
    })->name('higher-education');

    // Level Up (formerly Career Bridge) — coming soon. The route name is kept as
    // 'career-bridge' so existing links/CTAs ($lr/route('career-bridge')) keep
    // resolving to the new /level-up URL with no other changes needed.
    Route::get('/level-up', function () {
        return view('coming-soon');
    })->name('career-bridge');

    Route::redirect('/career-bridge', '/level-up');

    Route::get('/for-employers', function () {
        return view('coming-soon');
    })->name('for-employers');

    Route::get('/why-ci-ireland', function () {
        return view('why-ci-ireland');
    })->name('why-ci-ireland');

    // The standalone assessment page is now a reusable modal opened from any
    // [data-open-assessment-modal] trigger. This redirect keeps the named route
    // resolvable as a no-JS fallback for direct visits and old links.
    Route::redirect('/start-your-plan', '/higher-education')->name('start-your-plan');

    Route::post('/start-your-plan', [ProfileAssessmentController::class, 'store'])
        ->name('start-your-plan.store');

    Route::post('/assessment-lead', [AssessmentLeadController::class, 'store'])
        ->name('assessment-lead.store');

    Route::redirect('/about', '/why-ci-ireland', 301);
    Route::redirect('/study-in-ireland', '/higher-education', 301);
    Route::redirect('/already-in-ireland', '/higher-education', 301);
    Route::redirect('/professional', '/level-up', 301);
    Route::redirect('/corporate', '/for-employers', 301);
    Route::redirect('/erasmus', '/higher-education', 301);
    Route::redirect('/teens', '/higher-education', 301);
};

Route::middleware(SetLocale::class)->group($pageRoutes);

Route::middleware(SetLocale::class)
    ->prefix('pt')
    ->name('pt.')
    ->group($pageRoutes);
