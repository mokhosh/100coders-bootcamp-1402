@props(['title'])

<div class="container mx-auto">
    <h3 class="mt-48 text-5xl text-gray-600 font-semibold">{{ $title }}</h3>
    <hr class="mt-6 w-32 border-2 rounded border-orange-500">

    {{ $slot }}
</div>
