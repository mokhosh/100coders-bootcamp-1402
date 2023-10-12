<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

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
                ->withErrors($validator)
                ->withFragment('footer');
        }

        $user->subscribers()->create($validator->validated());

        return back()
            ->with('status', 'Thanks for subscribing!')
            ->withFragment('footer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
