<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit') . ' ' . $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('post.update', $post) }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="slug" :value="__('Slug')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $post->slug)" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>

                        <div>
                            <x-input-label for="body" :value="__('Body')" />
                            <x-text-area id="body" name="body" type="text" class="mt-1 block w-full">{{ old('body', $post->body) }}</x-text-area>
                            <x-input-error class="mt-2" :messages="$errors->get('body')" />
                        </div>

                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            <x-file-input id="image" name="image" type="text" class="mt-1 block w-full" :value="old('image')" accept=".jpeg,.jpg"/>
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div>
                            <x-input-label :value="__('Current Image')" />
                            <img src="{{ $post->image_url }}" class="rounded-md max-w-sm">
                        </div>

                        <div>
                            <x-input-label for="category_id" :value="__('Category')" />
                            <x-select id="category_id" name="category_id" :options="$categories" class="mt-1 block w-full" :value="old('category_id', $post->category_id)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                        </div>

                        <div>
                            <x-input-label for="published_at" :value="__('Published At')" />
                            <x-datetime id="published_at" name="published_at" class="mt-1 block w-full" :value="old('published_at', $post->published_at)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('published_at')" />
                        </div>

                        <div>
                            <x-input-label for="tags" :value="__('Tags')" />
                            <x-text-input id="tags" name="tags" type="text" class="mt-1 block w-full" :value="old('tags', $post->tags_string)" />
                            <x-input-error class="mt-2" :messages="$errors->get('tags')" />
                        </div>

                        <div>
                            <x-checkbox id="is_draft" name="is_draft" :label="__('Is Draft')" :checked="old('is_draft', $post->is_draft)"/>
                            <x-input-error class="mt-2" :messages="$errors->get('is_draft')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-link-button-gray href="{{ route('post.index') }}">Go Back</x-link-button-gray>

                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
