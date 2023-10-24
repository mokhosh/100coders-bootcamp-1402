<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $results = DB::table('posts')->get();
    $results = DB::table('posts')->select(['id', 'title'])->get();
    $results = DB::table('posts')->select(['id', 'title'])->where('id', '=', 2)->get();
    $results = DB::table('posts')->select(['id', 'title'])->where('id', '>', 2)->get();
    $results = DB::table('posts')
        ->select(['id', 'title'])
        ->where('id', '>', 2)
        ->where('id', '<', 8)
        ->get();
    $results = DB::table('posts')
        ->select(['id', 'title'])
        ->where('id', '>', 2)
        ->where(function ($query) {
            $query->where('id', '<', 8)
                ->orWhere('id', '=', 11);
        })
        ->get();
    $results = DB::table('posts')
        ->select(['id', 'title'])
        ->where('id', '>', 2)
        ->whereNot(function ($query) {
            $query->where('id', '>', 8)
                ->orWhere('id', '=', 5);
        })
        ->get();
    $results = DB::table('posts')
        ->select(['id', 'created_at'])
        ->whereYear('created_at', '2020')
        ->get();
    $results = DB::table('posts')
        ->select(['id', 'title'])
        ->whereYear('created_at', '2023')
        ->orderBy('title', 'desc')
        ->get();
    $results = Cache::remember('query', 10, fn () => DB::table('posts')
        ->select(['id', 'title'])
        ->whereYear('created_at', '2023')
        ->inRandomOrder()
        ->get());

    return $results;
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard', [DashboardController::class, 'upload'])->name('dashboard.upload');
});

require __DIR__.'/auth.php';
