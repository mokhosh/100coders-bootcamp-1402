<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Category::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('admin.category.index', [
            'categories' => $request->user()->categories()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
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
                Rule::unique('categories')->where(fn ($query) => $query->where('user_id', $request->user()->id)),
            ],
        ]);

        $request->user()->categories()->create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('title')),
        ]);

        return to_route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|min:3|max:20',
            'slug' => [
                'nullable', 'string', 'min:3', 'max:20', 'alpha_dash',
                Rule::unique('categories')
                    ->where(fn ($query) => $query->where('user_id', $request->user()->id))
                    ->ignore($category->id),
            ],
        ]);

        $category->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug') ?? Str::slug($request->input('title')),
        ]);

        return to_route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return to_route('category.index');
    }
}
