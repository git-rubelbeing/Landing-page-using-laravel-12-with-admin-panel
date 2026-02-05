<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landing.index');
Route::post('/subscribe', [LandingPageController::class, 'subscribe'])
    ->middleware('throttle:10,1')
    ->name('landing.subscribe');
