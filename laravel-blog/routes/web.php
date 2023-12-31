<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::domain('{user:username}.' . config('app.url'))->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');
    Route::post('post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::get('category/{category:slug}', [BlogController::class, 'category'])->name('blog.category');
    Route::get('tag/{tag:slug}', [BlogController::class, 'tag'])->withoutScopedBindings()->name('blog.tag');
    Route::get('search', [BlogController::class, 'search'])->name('blog.search');
});

Route::get('/', [SiteController::class, 'index'])->name('home');
