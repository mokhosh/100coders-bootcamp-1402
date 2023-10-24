<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('dashboard.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" accept="image/jpeg" required/>
                        <button class="bg-gray-100 hover:bg-gray-200 rounded px-4 py-1">Upload</button>
                    </form>

                    <div class="mt-12 grid grid-cols-3 gap-4">
                        @foreach($images as $image)
                            <div class="rounded overflow-hidden">
                                <img src="{{ $image->url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
