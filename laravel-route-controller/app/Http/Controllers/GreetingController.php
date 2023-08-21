<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetingController extends Controller
{
    // you can create any public method (function) that you need and use them in your routes
    // these functions can receive everything that a simple closure would receive, like $name here
    public function hello($name)
    {
        return "Hello, {$name}!";
    }

    public function bye($name = 'my friend')
    {
        return "Bye, {$name}!";
    }
}
