<x-blog-layout :$blog>
    <div class="bg-primary-200">
        <div class="flex container mx-auto justify-around items-center">
            <div>
                <div class="font-title text-6xl text-primary-900">{{ $blog->title }}</div>
                <div class="text-xl text-primary-500">Tag: #{{ $tag->name }}</div>
            </div>

            <div class="h-96">
                <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="w-full h-full object-cover rounded-3xl relative top-16">
            </div>
        </div>
    </div>

    <div class="mt-32 p-16 pb-48 container max-w-screen-xl mx-auto space-y-48">
        @foreach($posts as $post)
            <x-widgets.post-item :$blog :$post/>
        @endforeach

        {{ $posts->links() }}
    </div>
</x-blog-layout>
