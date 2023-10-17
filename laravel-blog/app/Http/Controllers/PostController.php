<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(User $user, Post $post)
    {
        $post->increment('views');

        return view('blog.show', [
            'comments' => $post->comments,
            'blog' => $user,
            'post' => $post,
        ]);
    }
}
