@props(['type' => 'submit', 'variant' => 'primary'])

@php
    $classes = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white',
        'secondary' => 'bg-gray-600 hover:bg-gray-700 text-white',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white'
    ];
@endphp

<button
    type="{{ $type }}"
    {{ $attributes->merge(['class' => 'px-6 py-3 font-semibold rounded-lg transition-colors duration-200 ' . $classes[$variant]]) }}
>
    {{ $slot }}
</button>
