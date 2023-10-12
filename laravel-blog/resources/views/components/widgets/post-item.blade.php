@props([
    'blog',
    'post',
])

<div class="flex gap-16">
    <div class="flex-1">
        <div class="text-lg text-gray-400 font-semibold">{{ $post->created_at->diffForHumans() }}</div>
        <div class="font-title font-bold text-5xl">{{ $post->title }}</div>
        <div class="mt-4 px-3 py-0.5 text-sm rounded-md inline-flex bg-primary-100 text-primary-400 font-semibold">{{ $post->category->title }}</div>
        @foreach($post->tags as $tag)
            <div class="mt-4 px-3 py-0.5 text-sm rounded-md inline-flex bg-sky-100 text-sky-400 font-semibold">#{{ $tag->name }}</div>
        @endforeach
        <div class="mt-4 text-xl text-gray-500">{!! str($post->body)->words(50, '...') !!}</div>

        <div class="mt-10">
            <a href="{{ route('post.show', ['user' => $blog, 'post' => $post]) }}" class="px-8 py-3 text-lg font-semibold rounded-lg bg-secondary-200 text-secondary-800 hover:bg-secondary-300 hover:text-secondary-900">Read More</a>
        </div>
    </div>

    <div class="flex-1">
        <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="rounded-3xl h-96 w-full object-cover">
    </div>
</div>
