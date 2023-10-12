<x-blog-layout>
    <div class="bg-primary-200">
        <div class="flex container mx-auto justify-around items-center">
            <div>
                <div class="font-title text-6xl text-primary-900">{{ $blog->title }}</div>
                <div class="text-xl text-primary-500">{{ $blog->subtitle }}</div>
            </div>

            <div class="h-96">
                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover rounded-3xl relative top-16">
            </div>
        </div>
    </div>

    <div class="mt-32 p-16 pb-48 container max-w-screen-xl mx-auto space-y-48">
        @foreach($posts as $post)
            <x-widgets.blog-item :$post/>
        @endforeach

        {{ $posts->links() }}
    </div>

    <x-slot name="footer">
        {{-- todo subscription --}}

        <div class="grid grid-cols-3 gap-16">
            <div class="text-left">
                <h3 class="text-xl font-semibold">About</h3>

                <div>{{ $blog->about }}</div>
            </div>

            <div class="flex flex-col items-start gap-1">
                <h3 class="text-xl font-semibold">Categories</h3>

                @foreach($categories as $category)
                    <a href="#" class="text-primary-700 hover:text-primary-900">{{ $category->title }}</a>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-blog-layout>
