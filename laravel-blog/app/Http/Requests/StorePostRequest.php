<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'title' => 'required|string|min:3|max:40',
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
            'tags' => 'nullable|string',
        ];
    }
}
