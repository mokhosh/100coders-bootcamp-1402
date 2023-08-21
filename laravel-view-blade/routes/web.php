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

// if you use the view syntax, all parameters will be passed to the view automatically
Route::view('hi/{name}', 'hello');

// you can nest your views in folers and use them with dot notation
// this will look for a view called "first" in a folder called "group" inside rources/views
Route::view('/nested', 'group.first');

// you can pass a string that contains HTML to your views
// it's up to you how to use that in your view
// checkout html-entities.blade.php to see how we use this
Route::get('html', function () {
    $myHtmlString = '<h1>Salaam</h1>';

    // you can access this variable in the view like $danger and not $myHtmlString
    return view('html-entities', ['danger' => $myHtmlString]);
});

// you can have conditions and loops in your blade files
Route::view('blade', 'blade');
