<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewPost;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }

    public function index(Request $request)
    {
        return view('admin.post.index', [
            'posts' => $request->user()->posts()->paginate(),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.post.create', [
            'categories' => $request->user()->categories,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $post = $request->user()->posts()->create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('title')),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'published_at' => $request->input('published_at'),
            'is_draft' => $request->boolean('is_draft') ?? false,
            'image' => $request->file('image')->store('post-image', 'public'),
        ]);

        $post->tags()->attach(Tag::findOrCreateFromRequest($request));

        NewPost::dispatch($post);

        return to_route('post.index');
    }

    public function edit(Request $request, Post $post)
    {
        return view('admin.post.edit', [
            'categories' => $request->user()->categories,
            'post' => $post,
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
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

        $post->tags()->sync(Tag::findOrCreateFromRequest($request));

        return to_route('post.index');
    }

    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->image);

        $post->delete();

        return to_route('post.index');
    }
}
