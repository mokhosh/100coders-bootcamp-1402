@props([
    'name',
    'label',
])

<select {{ $attributes->merge(['class' => 'border focus:border-blue-500 focus:outline-none rounded-md border-gray-300']) }}>
    <option>{{ $label }}</option>
</select>
