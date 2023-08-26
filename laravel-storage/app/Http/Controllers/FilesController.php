<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        Storage::put($request->filename, $request->note);

        return redirect('/');
    }
}
