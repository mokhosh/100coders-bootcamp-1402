<?php

namespace App\View\Components;

use App\Models\Tag;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlogLayout extends Component
{
    public $categories;
    public $tags;

    public function __construct(public User $blog)
    {
        $this->categories = $blog->categories;
        $this->tags = Tag::whereHas('posts', function ($query) use ($blog) {
            $query->where('author_id', $blog->id);
        })->get();
    }

    public function render(): View|Closure|string
    {
        return view('layouts.blog');
    }
}
