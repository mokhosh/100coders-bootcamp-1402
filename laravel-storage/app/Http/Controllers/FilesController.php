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

        return redirect()->route('note.edit', $request->filename);
    }

    public function edit($filename)
    {
        $note = Storage::get($filename);
        $updated = Storage::lastModified($filename);

        return view('note.edit', [
            'filename' => $filename,
            'updated' => $updated,
            'note' => $note,
        ]);
    }

    public function update(Request $request, $filename)
    {
        Storage::put($filename, $request->note);

        return redirect()->back();
    }

    public function delete($filename)
    {
        Storage::delete($filename);

        return redirect('/');
    }
}
