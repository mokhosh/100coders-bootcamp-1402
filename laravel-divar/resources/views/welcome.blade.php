<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div>
            <form action="{{ route('search') }}">
                <input name="q">

                <button type="submit">Search</button>
            </form>
        </div>
        
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
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

            <div class="grid lg:grid-cols-3 gap-4 max-w-7xl mx-auto p-6 lg:p-8">
                @foreach ($ads as $ad)
                    <a href="{{ route('adv.view', $ad) }}" class="bg-white shadow-md rounded p-4">
                        <div class="text-xl font-semibold">{{ $ad->title }}</div>
                        <div class="mt-4 text-sm text-slate-500">{{ $ad->price }}</div>
                        <div class="text-sm text-slate-400">{{ $ad->created_at->diffForHumans() }}</div>
                    </a>
                @endforeach
            </div>
        </div>
    </body>
</html>
