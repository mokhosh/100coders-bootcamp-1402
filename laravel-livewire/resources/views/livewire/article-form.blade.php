<div x-data="{ show: false }" x-on:article-created="show = true; setTimeout(() => show = false, 2000)" class="p-8">
    <form wire:submit="store">
        <div>
            <x-label for="title">{{ __('Title') }}<span class="text-red-600">*</span></x-label>
            <x-input id="title" class="block mt-1 w-full" type="text" wire:model="title" autofocus />
            <div class="text-red-600 text-sm font-semibold">
                @error('title')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <div class="mt-2">
            <x-label for="body">{{ __('Body') }}<span class="text-red-600">*</span></x-label>
            <x-input id="body" class="block mt-1 w-full" type="text" wire:model="body" autofocus />
            <div class="text-red-600 text-sm font-semibold">
                @error('body')
                    {{ $message }}
                @enderror
            </div>
        </div>

        <x-button class="mt-4">
            {{ __('Save') }}
        </x-button>
    </form>

    <div x-show="show" x-transition x-cloak class="mt-8 bg-green-200 text-green-700 rounded-lg p-4 border-l-4 border-green-500">
        Article created!
    </div>
</div>
