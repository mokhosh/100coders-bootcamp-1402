<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// you can simply create files called xxxxx.blade.php in /resources/views and use them in routes as xxxxx
Route::view('/new-blade', 'new');

// if your view needs a variable, you can pass variables to views with this syntax
// the variable will be avialable in the view by the name you specify as the array key
Route::get('/hello/{name}', function ($name) {
    return view('hello', ['name' => $name]);
});
