<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Post $post)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->post->author->title . ' has a new post',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.new-post-mail',
            with: [
                'post' => $this->post,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
