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
