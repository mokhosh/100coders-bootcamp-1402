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
        $tags = Tag::whereHas('posts', function ($query) use ($user) {
            $query->where('author_id', $user->id);
        })->get();

        return view('blog.show', [
            'categories' => $user->categories,
            'comments' => $post->comments,
            'blog' => $user,
            'post' => $post,
            'tags' => $tags,
        ]);
    }
}
