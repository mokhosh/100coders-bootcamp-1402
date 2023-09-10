<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserIsAdmin;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ads = Ad::get();

    return view('welcome', [
        'ads' => $ads,
    ]);
});

Route::get('/adv/{ad}', function (Ad $ad) {
    return $ad;
})->name('adv.view');

Route::get('search', function (Request $request) {

    $q = $request->input('q');

    $ads = Ad::where('title', 'like', "%$q%")->orWhere('details', 'like', "%$q%")->get();

    return $ads;

})->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [AdController::class, 'index'])->name('ad.index');
    Route::get('/ad/create', [AdController::class, 'create'])->name('ad.create');
    Route::post('/ad/create', [AdController::class, 'store'])->name('ad.store');
    Route::get('/ad/{ad}/view', [AdController::class, 'show'])->name('ad.view');
    Route::get('/ad/{ad}/edit', [AdController::class, 'edit'])->name('ad.edit');
    Route::put('/ad/{ad}/edit', [AdController::class, 'update'])->name('ad.update');
    Route::delete('/ad/{ad}/delete', [AdController::class, 'destroy'])->name('ad.destroy');

    Route::middleware(EnsureUserIsAdmin::class)->prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/{ad}/edit', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('/{ad}/edit', [AdminController::class, 'update'])->name('admin.update');
    });
});

require __DIR__.'/auth.php';
