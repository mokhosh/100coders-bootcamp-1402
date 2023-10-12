@props(['blog'])

<a href="{{ route('blog.index', ['user' => $blog]) }}" class="flex-1 rounded-3xl shadow-2xl overflow-hidden">
    <img src="{{ $blog->image_url }}" alt="{{ $blog->title }}" class="h-64 w-full object-cover">

    <div class="p-6 bg-white">
        <div class="px-3 py-1 rounded-md inline-flex bg-primary-100 text-primary-400 font-semibold">
            {{ '@' . $blog->username }}
        </div>

        <div class="mt-2 text-xl font-semibold">
            {{ $blog->title }}
        </div>

        <div class="mt-2 text-sm text-gray-400 font-semibold">
            {{--  latest post's created at  --}}
            {{ $blog->created_at->diffForHumans() }}
        </div>
    </div>
</a>
