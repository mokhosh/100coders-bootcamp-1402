<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ad details: {{ $ad->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <a href="{{ route('ad.index') }}" class="bg-sky-100 hover:bg-sky-200 text-sky-600 text-sm font-semibold rounded px-4 py-2">Go Back</a>
                            
                        <div class="flex flex-col mt-4">
                            <label for="title">Title</label>
                            <input disabled id="title" name="title" value="{{ $ad->title }}">
                        </div>

                        <div class="flex flex-col mt-4">
                            <label for="details">Details</label>
                            <textarea disabled id="details" name="details">{{ $ad->details }}</textarea>
                        </div>

                        <div class="flex flex-col mt-4">
                            <label for="price">Price</label>
                            <input disabled id="price" name="price" value="{{ $ad->price }}">
                        </div>

                        <div class="flex flex-col mt-4">
                            <label for="contact">Contact</label>
                            <textarea disabled id="contact" name="contact">{{ $ad->contact }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
