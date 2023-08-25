<?php

use App\Http\Controllers\NameController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::post('/', NameController::class);

require __DIR__.'/auth.php';
require __DIR__.'/breeze.php';
