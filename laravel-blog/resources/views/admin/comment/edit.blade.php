<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('comment.update', $comment) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="text" class="mt-1 block w-full" :value="old('email', $comment->email)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-area id="body" name="body" type="text" class="mt-1 block w-full">{{ old('body', $comment->body) }}</x-text-area>
                            <x-input-error class="mt-2" :messages="$errors->get('body')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-link-button-gray href="{{ route('comment.index') }}">Go Back</x-link-button-gray>

                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>

                    <form class="mt-6" action="{{ route('comment.moderate', $comment) }}" method="post">
                        @csrf
                        @method('patch')
                        <x-secondary-button type="submit">Moderate</x-secondary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
