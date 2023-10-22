<?php

namespace App\Providers;

use App\Events\NewComment;
use App\Events\NewPost;
use App\Listeners\NotifyAuthorAboutNewComment;
use App\Listeners\NotifySubscribersAboutNewPost;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    public function boot(): void
    {
        //
    }

    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
