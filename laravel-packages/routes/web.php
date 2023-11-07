<?php

use App\Models\Post;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $posts = Post::search($request->query('q'))->get();

    return view('welcome', [
        'posts' => $posts,
    ]);
});
