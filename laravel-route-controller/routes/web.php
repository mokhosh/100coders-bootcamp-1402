<?php

// import the Laravel Route class that helps us define routes
use Illuminate\Support\Facades\Route;

// simple route handling requests that come to / (root)
// handles the requests with a closure (unnamed function)
// the closure returns a view
// the view is located at /resources/views/welcome.blade.php
Route::get('/', function () {
    return view('welcome');
});

// if the only thing you need to do in your closure is to return a view you can use the view method instead of get
// this one line does the same thing as the previous three lines of code
Route::view('/', 'welcome');

// adding a new simple route that handles requests that come to /about
Route::get('/about', function () {
    return 'This is a project that demostrates the use of routes in Laravel';
});

// receving parameters in the route
// the parameter is passed to the closure that handles the route
// this will respond to /hello/ali for example
// this will not respond to /hello/ and will throw a 404 error
Route::get('/hello/{name}', function ($name) {
    // using double quotes (") to use variables inside strings
    return "Hello, {$name}!";
});

// making parameters optional
// the function argument must also be optional by providing a default value
// this will respond to both /bye/ali and /bye/
Route::get('/bye/{name?}', function ($name = 'my friend') {
    return "Bye, {$name}!";
});

// you can name your routes and later use that name to get information about them
// by using named routes you make it possible to easily change the url of a route without breaking your app
// you can get the url to this route by calling route('home') anywhere in your app
Route::view('/', 'welcome')->name('home');

// you can pass parameters when generating urls for named routes with this syntax:
    // route('hello', ['name' => 'ali'])
Route::get('hello/{name}', function ($name) {
    return "Hello, {$name}!";
})->name('hello');
