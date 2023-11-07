<?php

use App\Models\Post;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Debugbar::startMeasure('render','DB Access');
    $posts = Post::get();
    $posts->map(function ($post) {
        Debugbar::info($post);
        return [
            'title' => $post->title,
            'author' => $post->user->name,
        ];
    });
    Debugbar::stopMeasure('render');
    return view('welcome', [
        'posts' => $posts,
    ]);
});
