@props(['type' => 'success'])

@php
    $classes = 'p-4 rounded-lg mb-6 border';

    switch($type) {
        case 'success':
            $classes .= ' bg-green-900/20 border-green-500 text-green-400';
            $icon = '✓';
            break;
        case 'error':
            $classes .= ' bg-red-900/20 border-red-500 text-red-400';
            $icon = '✕';
            break;
        case 'warning':
            $classes .= ' bg-yellow-900/20 border-yellow-500 text-yellow-400';
            $icon = '⚠';
            break;
        default:
            $classes .= ' bg-blue-900/20 border-blue-500 text-blue-400';
            $icon = 'ℹ';
    }
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    <div class="flex items-center">
        <span class="text-xl mr-3">{{ $icon }}</span>
        <div>{{ $slot }}</div>
    </div>
</div>
