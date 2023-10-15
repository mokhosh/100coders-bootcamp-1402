<x-blog-layout :$blog>
    <div class="bg-primary-200">
        <div class="flex container mx-auto justify-around items-center">
            <div>
                <div class="font-title text-6xl text-primary-900">{{ $post->title }}</div>
                <div class="text-xl text-primary-500">{{ $post->created_at->diffForHumans() }} by {{ $post->author->name }}</div>
                <div>
                    <x-widgets.category-item :$blog :category="$post->category"/>
                    @foreach($post->tags as $tag)
                        <x-widgets.tag-item :$blog :$tag/>
                    @endforeach
                </div>
            </div>

            <div class="h-96">
                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover rounded-3xl relative top-16">
            </div>
        </div>
    </div>

    <div class="mt-32 prose prose-2xl p-16 container max-w-screen-lg mx-auto">
        {!! nl2br($post->body) !!}
    </div>

    {{-- comment section --}}
    <a id="comments"></a>
    <div class="container p-16 pb-48 max-w-screen-md mx-auto">
        <h3 class="text-xl font-semibold text-secondary-600">Comments</h3>

        <form action="{{ route('comment.store', ['user' => $blog, 'post' => $post]) }}" method="post">
            @csrf

            <div class="mt-4">
                <x-text-input id="email" name="email" type="email" placeholder="Email" class="block w-full" :value="old('email')" required />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="mt-4">
                <x-text-area id="body" name="body" type="text" placeholder="Comment" class="block w-full">{{ old('body') }}</x-text-area>
                <x-input-error class="mt-2" :messages="$errors->get('body')" />
            </div>

            <x-primary-button class="mt-4">Submit</x-primary-button>
        </form>

        @if (session()->has('comment-created'))
            <p class="mt-8 text-3xl tracking-tight font-semibold text-primary-700">Thanks for commenting!</p>
            <p class="mt-4 text-primary-600">Your comment awaits moderation!</p>
        @endif

        <div>
            @foreach($comments as $comment)
                <div class="mt-6 p-4 border rounded-lg bg-gray-100">
                    <div class="flex gap-2 text-sm text-gray-500">
                        <div>{{ str($comment->email)->before('@') }} said</div>
                        <div>{{ $comment->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="mt-2 text-lg">{{ $comment->body }}</div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- end comment section --}}
</x-blog-layout>
