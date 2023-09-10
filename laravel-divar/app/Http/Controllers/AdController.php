<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(Request $request)
    {
        $ads = $request->user()->ads;
        
        return view('ad.index', [
            'ads' => $ads,
        ]);
    }

    public function create()
    {
        return view('ad.create');
    }

    public function store(Request $request)
    {
        $request->user()->ads()->create($request->input());

        return redirect()->route('ad.index');
    }

    public function show(Ad $ad)
    {
        return view('ad.show', ['ad' => $ad]);
    }

    public function edit(Request $request, Ad $ad)
    {
        if ($request->user()->id != $ad->user_id) {
            return abort(403);
        }

        return view('ad.edit', [
            'ad' => $ad,
        ]);
    }

    public function update(Request $request, Ad $ad)
    {
        $ad->update($request->input());

        return redirect()->route('ad.index');
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return back();
    }
}
