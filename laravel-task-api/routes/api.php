<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\BoardCardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('board', BoardController::class);
    Route::apiResource('board.card', BoardCardController::class);
});
