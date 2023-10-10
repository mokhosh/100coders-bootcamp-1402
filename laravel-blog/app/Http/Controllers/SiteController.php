<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        $latestPosts = Post::with('category')->latest()->take(3)->get();
        $latestBlogs = User::orderBy(
                Post::select('created_at')
                    ->whereColumn('users.id', 'posts.author_id')
                    ->latest()
                    ->take(1)
            , 'desc')
            ->take(3)->get();
        $mostViewedPosts = Post::with('category')->orderBy('views', 'desc')->take(3)->get();
        $blogCount = User::count();

        return view('welcome', [
            'blogCount' => $blogCount,
            'latestPosts' => $latestPosts,
            'latestBlogs' => $latestBlogs,
            'mostViewedPosts' => $mostViewedPosts,
        ]);
    }
}
