@props(['title', 'value', 'icon' => null, 'color' => 'blue'])

@php
    $colorClasses = [
        'blue' => 'text-blue-400',
        'green' => 'text-green-400',
        'yellow' => 'text-yellow-400',
        'red' => 'text-red-400',
        'purple' => 'text-purple-400'
    ][$color] ?? 'text-blue-400';
@endphp

<x-panel class="text-center">
    @if($icon)
        <div class="text-2xl mb-2">{{ $icon }}</div>
    @endif
    <h3 class="text-2xl font-bold {{ $colorClasses }}">{{ $value }}</h3>
    <p class="text-gray-400 text-sm">{{ $title }}</p>
</x-panel>
