<?php

namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, User $user, Post $post)
    {
        $comment = $post->comments()->create($request->validated());

        NewComment::dispatch($comment);

        return back()
            ->with('comment-created', 'Your comment awaits moderation. Thanks!')
            ->withFragment('comments');
    }
}
