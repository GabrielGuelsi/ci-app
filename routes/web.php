<?php

use App\Http\Controllers\AssessmentLeadController;
use App\Http\Controllers\ProfileAssessmentController;
use App\Http\Middleware\SetLocale;
use Illuminate\Http\Request;
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

// Public confirmation page ZapSign redirects students to after they finish
// signing the Higher Education Agreement. The copy ships in pt-BR, es and en:
// the canonical URL auto-detects the visitor's browser language, and the
// explicit /pt, /es, /en variants let ZapSign (or the on-page switcher) lock a
// language. The page is fully static and carries no signer/agreement data.
Route::middleware(SetLocale::class)->group(function () {
    $renderAgreementSigned = function (string $locale) {
        app()->setLocale($locale);

        return view('agreement-signed');
    };

    Route::get('/agreement-signed', function (Request $request) use ($renderAgreementSigned) {
        return $renderAgreementSigned($request->getPreferredLanguage(['pt', 'es', 'en']));
    })->name('agreement-signed');

    foreach (['pt', 'es', 'en'] as $agreementLocale) {
        Route::get("/agreement-signed/{$agreementLocale}", function () use ($renderAgreementSigned, $agreementLocale) {
            return $renderAgreementSigned($agreementLocale);
        })->name("agreement-signed.{$agreementLocale}");
    }
});
