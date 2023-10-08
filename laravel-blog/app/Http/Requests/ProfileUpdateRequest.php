<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'username' => ['required', 'string', 'alpha_dash:ascii', 'max:20', Rule::unique(User::class)->ignore($this->user()->id)],
            'title' => ['required', 'string', 'max:40'],
            'subtitle' => ['nullable', 'string', 'min:5', 'max:255'],
            'about' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg', 'max:2048'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
