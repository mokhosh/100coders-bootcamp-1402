@props(['title' => 'Title'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="flex flex-col min-h-screen">
    <div class="bg-gray-200 p-4 flex justify-between">
        <div>
            <a class="text-purple-500" href="{{ route('home') }}">
                <x-logo/>
            </a>
        </div>
        <div class="flex gap-4 text-sm">
            <x-my.link href="{{ route('about') }}">About Me</x-my.link>
            <x-my.link href="{{ route('contact') }}">Contact Me</x-my.link>
        </div>
    </div>
    <div class="bg-gray-100 flex-1 flex flex-col">
        <div class="max-w-screen-lg mx-auto p-4 bg-white flex-1 w-full">
            {{ $slot }}
        </div>
    </div>
    <div class="bg-gray-800 text-xs text-gray-400 flex justify-center p-4">
        All rights reserved &copy; my-blog.com
    </div>
</body>
</html>
