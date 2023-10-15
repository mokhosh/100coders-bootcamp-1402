@props(['blog', 'tag'])

<a href="{{ route('blog.tag', ['user' => $blog, 'tag' => $tag]) }}" class="mt-4 px-3 py-0.5 text-sm rounded-md inline-flex bg-secondary-100 text-secondary-400 font-semibold">#{{ $tag->name }}</a>
