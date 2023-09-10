<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Creat a new Ad
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <form method="post" action="{{ route('ad.store') }}">
                            @csrf

                            <div class="flex flex-col mt-4">
                                <label for="title">Title</label>
                                <input id="title" name="title">
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="details">Details</label>
                                <textarea id="details" name="details"></textarea>
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="price">Price</label>
                                <input id="price" name="price">
                            </div>

                            <div class="flex flex-col mt-4">
                                <label for="contact">Contact</label>
                                <textarea id="contact" name="contact"></textarea>
                            </div>

                            <button type="submit" class="mt-4 bg-sky-100 hover:bg-sky-200 text-sky-600 text-sm font-semibold rounded px-4 py-2">Create Ad</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
