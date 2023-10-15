<?php

namespace App\Providers;

use App\Models\Comment;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/post';

    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::domain(config('app.url'))
                ->middleware('web')
                ->group(base_path('routes/auth.php'));

            Route::domain(config('app.url'))
                ->middleware(['web', 'auth'])
                ->group(base_path('routes/admin.php'));

            Route::bind('comment', function (string $value) {
                return Comment::withoutGlobalScopes()->findOrFail($value);
            });
        });
    }
}
