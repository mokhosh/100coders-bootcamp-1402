<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <x-link-button-green href="{{ route('post.create') }}">Create Post</x-link-button-green>

                    <div>
                        <x-admin.table>
                            <x-admin.table-header>
                                <x-admin.table-column>ID</x-admin.table-column>
                                <x-admin.table-column>Title</x-admin.table-column>
                                <x-admin.table-column>Slug</x-admin.table-column>
                                <x-admin.table-column>Category</x-admin.table-column>
                                <x-admin.table-column>Published At</x-admin.table-column>
                                <x-admin.table-column>Is Draft</x-admin.table-column>
                                <x-admin.table-column></x-admin.table-column>
                            </x-admin.table-header>

                            @foreach($posts as $post)
                                <x-admin.table-row>
                                    <x-admin.table-column>{{ $post->id }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $post->title }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $post->slug }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $post->category->title }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $post->published_at }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $post->is_draft }}</x-admin.table-column>
                                    <x-admin.table-column class="flex gap-2 justify-end">
                                        <x-link-button-gray href="{{ route('post.edit', $post) }}">Edit</x-link-button-gray>

                                        <form method="post" action="{{ route('post.destroy', $post) }}">
                                            @csrf
                                            @method('delete')

                                            <x-danger-button onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                        </form>
                                    </x-admin.table-column>
                                </x-admin.table-row>
                            @endforeach
                        </x-admin.table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
