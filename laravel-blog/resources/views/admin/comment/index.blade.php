<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <x-admin.table>
                            <x-admin.table-header>
                                <x-admin.table-column>ID</x-admin.table-column>
                                <x-admin.table-column>Email</x-admin.table-column>
                                <x-admin.table-column>Comment</x-admin.table-column>
                                <x-admin.table-column>Moderated At</x-admin.table-column>
                                <x-admin.table-column>Created At</x-admin.table-column>
                                <x-admin.table-column></x-admin.table-column>
                            </x-admin.table-header>

                            @foreach($comments as $comment)
                                <x-admin.table-row>
                                    <x-admin.table-column>{{ $comment->id }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $comment->email }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $comment->body }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $comment->moderated_at?->diffForHumans() }}</x-admin.table-column>
                                    <x-admin.table-column>{{ $comment->created_at->diffForHumans() }}</x-admin.table-column>
                                    <x-admin.table-column class="flex gap-2 justify-end">
                                        <form action="{{ route('comment.moderate', $comment) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <x-secondary-button type="submit">Moderate</x-secondary-button>
                                        </form>

                                        <x-link-button-gray href="{{ route('comment.edit', $comment) }}">Edit</x-link-button-gray>

                                        <form method="post" action="{{ route('comment.destroy', $comment) }}">
                                            @csrf
                                            @method('delete')

                                            <x-danger-button onclick="return confirm('Are you sure?')">Delete</x-danger-button>
                                        </form>
                                    </x-admin.table-column>
                                </x-admin.table-row>
                            @endforeach
                        </x-admin.table>

                        <div class="mt-6">
                            {{ $comments->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
