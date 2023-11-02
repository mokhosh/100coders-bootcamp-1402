<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;

class SearchBox extends Component
{
    public $q = '';

    public function render()
    {
        return view('livewire.search-box', [
            'articles' => strlen($this->q) < 3 ? [] : Article::search($this->q)->get(),
        ]);
    }
}
