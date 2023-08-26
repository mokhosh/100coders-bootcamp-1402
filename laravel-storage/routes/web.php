<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilesController::class, 'index']);
Route::get('/note/create', [FilesController::class, 'create'])->name('note.create');
Route::post('/note/store', [FilesController::class, 'store'])->name('note.store');
