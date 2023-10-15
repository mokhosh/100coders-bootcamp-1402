@props(['blog', 'category'])

<a href="{{ route('blog.category', ['user' => $blog, 'category' => $category]) }}" class="mt-4 px-3 py-0.5 text-sm rounded-md inline-flex bg-primary-100 text-primary-400 font-semibold">{{ $category->title }}</a>
