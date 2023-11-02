<div>
    <form>
        <input type="text" wire:model.live="q" class="w-full">
    </form>

    <div class="grid gap-2 mt-4">
        @foreach($articles as $article)
            <div class="p-2 bg-white rounded-md">{{ $article->title }}</div>
        @endforeach
    </div>
</div>
