<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['category', 'tags'])->paginate(5);

        return view('blog.index', [
            'blog' => $user,
            'posts' => $posts,
        ]);
    }

    public function category(User $user, Category $category)
    {
        $posts = $category->posts()->with(['category', 'tags'])->paginate(5);

        return view('blog.category', [
            'category' => $category,
            'blog' => $user,
            'posts' => $posts,
        ]);
    }

    public function tag(User $user, Tag $tag)
    {
        $posts = $tag->posts()
            ->whereBelongsTo($user, 'author')
            ->with(['category', 'tags'])
            ->paginate(5);

        return view('blog.tag', [
            'tag' => $tag,
            'blog' => $user,
            'posts' => $posts,
        ]);
    }

    public function search(Request $request, User $user)
    {
        $query = $request->query('q');
        $posts = $user->posts()
            ->where('title', 'like', "%$query%")
            ->orWhere('body', 'like', "%$query%")
            ->with(['category', 'tags'])
            ->paginate(5);

        return view('blog.search', [
            'query' => $query,
            'blog' => $user,
            'posts' => $posts,
        ]);
    }
}
