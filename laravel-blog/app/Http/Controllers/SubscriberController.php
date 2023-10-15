<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->input(),
            ['email' => 'required|email|unique:subscribers'],
            [
                'email' => [
                    'unique' => 'This email is already a subscriber.',
                ],
            ],
        );

        if ($validator->fails()) {
            return back()
                ->withErrors($validator, 'subscribe')
                ->withFragment('footer');
        }

        $user->subscribers()->create($validator->validated());

        return back()
            ->with('subscribed', 'Thanks for subscribing!')
            ->withFragment('footer');
    }
}
