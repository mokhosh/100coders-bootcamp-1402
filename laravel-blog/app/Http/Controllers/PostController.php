<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.post.index', [
            'posts' => $request->user()->posts()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.post.create', [
            'categories' => $request->user()->categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:20',
            'slug' => [
                'nullable', 'string', 'min:3', 'max:20', 'alpha_dash',
                Rule::unique('posts')->where(fn ($query) => $query->where('author_id', $request->user()->id)),
            ],
            'body' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpg|max:2048',
            'category_id' => [
                'required', 'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('user_id', $request->user()->id)),
            ],
            'published_at' => 'nullable|date',
        ]);

        $request->user()->posts()->create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('title')),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'published_at' => $request->input('published_at'),
            'is_draft' => $request->boolean('is_draft') ?? false,
            'image' => $request->file('image')->store('post-image', 'public'),
        ]);

        return to_route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post)
    {
        return view('admin.post.edit', [
            'categories' => $request->user()->categories,
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:20',
            'slug' => [
                'nullable', 'string', 'min:3', 'max:20', 'alpha_dash',
                Rule::unique('posts')
                    ->where(fn ($query) => $query->where('author_id', $request->user()->id))
                    ->ignore($post->id),
            ],
            'body' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpg|max:2048',
            'category_id' => [
                'required', 'integer',
                Rule::exists('categories', 'id')->where(fn ($query) => $query->where('user_id', $request->user()->id)),
            ],
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);

            $post->image = $request->file('image')->store('post-image', 'public');
        }

        $post->fill([
            'title' => $request->input('title'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('title')),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'published_at' => $request->input('published_at'),
            'is_draft' => $request->boolean('is_draft') ?? false,
        ]);

        $post->save();

        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);

        $post->delete();

        return to_route('post.index');
    }
}
