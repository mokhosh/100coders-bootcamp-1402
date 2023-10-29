@props([
    'name',
    'label',
])
<div class="group relative">
    <label class="absolute right-4 -top-3 group-focus-within:text-blue-700 text-gray-400 bg-white px-2" for="{{ $name }}">{{ $label }}</label>
    <input {{ $attributes->merge(['class' => 'w-full border focus:border-blue-500 focus:outline-none rounded-md border-gray-300']) }} type="text" id="{{ $name }}">
</div>
