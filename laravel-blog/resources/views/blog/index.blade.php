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
            <x-widgets.post-item :$post/>
        @endforeach

        {{ $posts->links() }}
    </div>

    <x-slot name="footer">
        <div class="flex justify-between items-center bg-primary-100 p-16 rounded-3xl">
            <div class="text-left">
                @if (session()->has('status'))
                    <p class="text-3xl tracking-tight font-semibold text-primary-700">Thanks for subscribing</p>
                    <p class="mt-4 text-primary-600">You will get notified whenever {{ $blog->name }} posts a new post!</p>
                @else
                    <p class="text-3xl tracking-tight font-semibold text-primary-700">Subscribe to {{ $blog->title }}</p>
                    <p class="mt-4 text-primary-600">Get notified whenever {{ $blog->name }} posts a new post!</p>
                @endif
            </div>

            <div class="text-left">
                <form action="{{ route('subscriber.store', $blog) }}" method="post" class="flex items-stretch rounded-lg focus-within:ring-4 focus-within:ring-primary-200">
                    @csrf
                    <input type="email" name="email" class="px-6 py-3 text-primary-700 w-80 border-none rounded-l-lg focus:ring-0" placeholder="Enter your email" required>
                    <button class="px-8 py-2 bg-brown-400 rounded-r-lg uppercase text-white font-semibold">Subscribe</button>
                </form>

                @error('email')
                    <div class="mt-1 text-red-600">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mt-24 grid grid-cols-3 gap-16">
            <div class="text-left">
                <h3 class="text-xl font-semibold">About {{ $blog->title }}</h3>

                <div>{{ $blog->about }}</div>
            </div>

            <div class="flex flex-col items-start gap-1">
                <h3 class="text-xl font-semibold">Categories</h3>

                @foreach($categories as $category)
                    <a href="#" class="text-primary-700 hover:text-primary-900">{{ $category->title }}</a>
                @endforeach
            </div>

            <div class="flex flex-col items-start gap-1 text-left">
                <h3 class="text-xl font-semibold">Tags</h3>

                <div>
                    @foreach($tags as $tag)
                        <a href="#" class="bg-primary-200 px-2 py-0.5 rounded text-xs text-primary-500 hover:text-primary-700">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </x-slot>
</x-blog-layout>
