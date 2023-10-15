<x-blog-layout :$blog>
    <div class="bg-primary-200">
        <div class="flex container mx-auto justify-around items-center">
            <div>
                <div class="font-title text-6xl text-primary-900">{{ $blog->title }}</div>
                <div class="text-xl text-primary-500">Results for: {{ $query }}</div>

                <form class="flex items-center gap-2 mt-4" action="{{ route('blog.search', $blog) }}">
                    <x-text-input type="text" name="q" required class="text-sm"/>

                    <button class="text-primary-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                            <path d="M21 21l-6 -6"></path>
                        </svg>
                    </button>
                </form>
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
