<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    public function rules(Request $request): array
    {
        return [
            'title' => 'required|string|min:3|max:20',
            'slug' => [
                'nullable', 'string', 'min:3', 'max:20', 'alpha_dash',
                Rule::unique('categories')->where(fn ($query) => $query->where('user_id', $request->user()->id)),
            ],
        ];
    }
}
