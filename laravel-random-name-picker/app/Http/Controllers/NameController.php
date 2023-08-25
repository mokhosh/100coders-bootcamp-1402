<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameController extends Controller
{
    public function __invoke(Request $request)
    {
        $list = explode("\r\n", $request->input('names'));
        $randomIndex = array_rand($list);
        $randomName = $list[$randomIndex];

        return view('welcome', [
            'name' => $randomName,
            'names' => $request->input('names', ''),
        ]);
    }
}
