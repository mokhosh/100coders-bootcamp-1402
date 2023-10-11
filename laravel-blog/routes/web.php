<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::domain('{user:username}.' . config('app.url'))->group(function () {
    Route::get('/', [BlogController::class, 'index']);
});

Route::get('/', [SiteController::class, 'index'])->name('home');
