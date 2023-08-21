<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// you can simply create files called xxxxx.blade.php in /resources/views and use them in routes as xxxxx
Route::view('/new-blade', 'new');
