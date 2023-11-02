<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Component;

class ArticleForm extends Component
{
    #[Rule(['required', 'min:3'])]
    public $title = '';

    #[Rule(['required', 'min:10'])]
    public $body = '';

    public function store()
    {
        $this->validate();

        Article::create([
            'title' => $this->title,
            'body' => $this->body,
        ]);

        $this->reset();
        $this->dispatch('article-created');
    }

    public function render()
    {
        return view('livewire.article-form');
    }
}
