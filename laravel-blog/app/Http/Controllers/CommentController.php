<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, User $user, Post $post)
    {
        $post->comments()->create($request->validated());

        return back()
            ->with('comment-created', 'Your comment awaits moderation. Thanks!')
            ->withFragment('comments');
    }
}
