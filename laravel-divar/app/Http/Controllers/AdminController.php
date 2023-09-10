<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'ads' => Ad::get(),
        ]);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Ad $ad)
    {
        return view('admin.edit', [
            'ad' => $ad,
        ]);
    }

    public function update(Request $request, Ad $ad)
    {
        $ad->update($request->input());

        return redirect()->route('admin.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
