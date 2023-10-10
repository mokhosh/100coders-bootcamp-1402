<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @vite('resources/css/app.css')
    </head>

    <body class="antialiased bg-orange-50">
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

        {{--  Hero Section  --}}
        <div class="bg-orange-100">
            <div class="flex justify-around container mx-auto">
                <div class="flex flex-col justify-center p-16">
                    <div class="text-7xl text-lime-700">Join Larablog!</div>
                    <div class="text-2xl text-lime-600">Join {{ $blogCount }} {{ Str::plural('blog', $blogCount) }} on Larablog today.</div>

                    <div class="mt-20">
                        <a href="{{ route('register') }}" class="px-10 py-5 text-2xl font-semibold rounded-xl bg-lime-400 text-lime-800 hover:bg-lime-500 hover:text-lime-900">Create My Blog</a>
                    </div>
                </div>

                <div>
                    <x-home.hero-illustration class="w-[50rem] h-[50rem] -mb-32" />
                </div>
            </div>
        </div>
        {{--  End Hero Section  --}}

        {{--  Latest Posts  --}}
        <x-home.section title="Latest Posts">
            <div class="flex mt-16 gap-12">
                @foreach($latestPosts as $post)
                    <x-widgets.post-card :$post/>
                @endforeach
            </div>
        </x-home.section>
        {{--  End Latest Posts  --}}

        {{--  Latest Blogs  --}}
        <x-home.section title="Latest Blogs">
            <div class="flex mt-16 gap-12">
                @foreach($latestBlogs as $blog)
                    <x-widgets.blog-card :$blog/>
                @endforeach
            </div>
        </x-home.section>
        {{--  End Latest Blogs  --}}

        {{--  Most Viewed Posts  --}}
        <x-home.section title="Most Viewed Posts">
            <div class="flex mt-16 gap-12">
                @foreach($mostViewedPosts as $post)
                    <x-widgets.post-card :$post/>
                @endforeach
            </div>
        </x-home.section>
        {{--  End Most Viewed Posts  --}}

        <div class="mt-48 bg-orange-700 text-orange-200 p-8">
            <div class="container mx-auto text-center">
                All Rights Reserved &copy; {{ now()->year }}
            </div>
        </div>
    </body>
</html>
