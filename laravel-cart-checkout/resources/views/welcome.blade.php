<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased">
            @if (Route::has('login'))
                <div class="container mx-auto flex gap-4 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>

                        <livewire:cart-button/>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            <div class="max-w-7xl w-full mx-auto p-6 lg:p-8 grid grid-cols-3 gap-4">
                @foreach($products as $product)
                    <div x-data>
                        <h3 class="text-xl font-semibold">{{ $product->title }}</h3>
                        <div>{{ $product->price }}</div>

                        <button x-on:click="$dispatch('add-to-cart', [{{ $product->id }}])" class="mt-2 bg-green-300 hover:bg-green-200 p-2">Add to cart</button>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
