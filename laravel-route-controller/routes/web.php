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

// adding a new simple route that handles requests that come to /about
Route::get('/about', function () {
    return 'This is a project that demostrates the use of routes in Laravel';
});

// receving parameters in the route
// the parameter is passed to the closure that handles the route
Route::get('/hello/{name}', function ($name) {
    // using double quotes (") to use variables inside strings
    return "Hello, {$name}!";
});
