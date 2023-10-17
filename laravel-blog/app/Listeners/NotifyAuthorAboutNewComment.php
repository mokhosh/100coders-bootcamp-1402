<?php

namespace App\Listeners;

use App\Events\NewComment;
use App\Notifications\NewCommentNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyAuthorAboutNewComment implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(NewComment $event): void
    {
        $event->comment->post->author->notify(new NewCommentNotification);
    }
}
