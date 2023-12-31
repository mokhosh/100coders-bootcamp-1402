<?php

use App\Http\Controllers\FilesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FilesController::class, 'index']);
Route::get('/note/create', [FilesController::class, 'create'])->name('note.create');
Route::post('/note/store', [FilesController::class, 'store'])->name('note.store');
Route::get('/note/edit/{note}', [FilesController::class, 'edit'])->name('note.edit');
Route::put('/note/update/{note}', [FilesController::class, 'update'])->name('note.update');
Route::delete('/note/delete/{note}', [FilesController::class, 'delete'])->name('note.delete');
