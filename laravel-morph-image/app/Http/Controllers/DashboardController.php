<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard', [
            'images' => $request->user()->images,
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg|max:2048',
        ]);

        $request->user()->images()->create([
            'path' => $request->file('image')->store('images', 'public'),
        ]);

        return to_route('dashboard');
    }
}
