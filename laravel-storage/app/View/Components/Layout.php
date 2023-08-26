<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class Layout extends Component
{
    public function render()
    {
        $files = Storage::files();

        return view('components.layout', [
            'files' => $files,
        ]);
    }
}
