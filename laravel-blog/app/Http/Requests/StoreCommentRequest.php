<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'body' => 'required|string|min:5|max:500',
        ];
    }

    public function getRedirectUrl(): string
    {
        return parent::getRedirectUrl() . '#comments';
    }
}
