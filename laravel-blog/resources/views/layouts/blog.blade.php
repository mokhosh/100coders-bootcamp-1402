<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Work+Sans:wght@200;400;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resource/js/app.js'])
</head>

<body class="antialiased">
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                @endif
            @endauth
        </div>
    @endif

    {{ $slot }}

    <div class="bg-primary-300 text-primary-900 p-8">
        <div class="p-16 container max-w-screen-xl mx-auto text-center">
            <a id="footer"></a>

            <x-widgets.subscribe :$blog />

            <div class="mt-24 grid grid-cols-3 gap-16">
                <div class="text-left">
                    <h3 class="text-xl font-semibold">About {{ $blog->title }}</h3>

                    <div>{{ $blog->about }}</div>
                </div>

                <div class="flex flex-col items-start gap-1">
                    <h3 class="text-xl font-semibold">Categories</h3>

                    @foreach($categories as $category)
                        <a href="{{ route('blog.category', ['user' => $blog, 'category' =>$category]) }}" class="text-primary-700 hover:text-primary-900">{{ $category->title }}</a>
                    @endforeach
                </div>

                <div class="flex flex-col items-start gap-1 text-left">
                    <h3 class="text-xl font-semibold">Tags</h3>

                    <div>
                        @foreach($tags as $tag)
                            <a href="{{ route('blog.tag', ['user' => $blog, 'tag' =>$tag]) }}" class="bg-primary-200 px-2 py-0.5 rounded text-xs text-primary-500 hover:text-primary-700">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
