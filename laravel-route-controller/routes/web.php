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
