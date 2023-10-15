<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
