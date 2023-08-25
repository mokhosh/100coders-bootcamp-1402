<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

require __DIR__.'/auth.php';
require __DIR__.'/breeze.php';
