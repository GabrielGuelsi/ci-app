<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('coming-soon');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/higher-education', function () {
    return view('higher-education');
});

Route::get('/erasmus', function () {
    return view('erasmus');
});

Route::get('/teens', function () {
    return view('teens');
})->name('teens');

Route::get('/corporate', function () {
    return view('corporate');
})->name('corporate');
