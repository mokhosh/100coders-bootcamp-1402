<?php

use App\Models\Post;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    Debugbar::disable();
    $post = Post::first();

    return view('welcome', [
        'post' => $post,
    ]);
});
