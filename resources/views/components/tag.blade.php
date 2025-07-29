@props(['tag', 'size' => 'normal'])

@php
    $sizeClasses = [
        'small' => 'px-2 py-1 text-xs',
        'normal' => 'px-3 py-1 text-sm'
    ];
@endphp

<a href="/tag/{{ $tag->name }}"
    class="inline-block bg-blue-600/20 text-blue-400 border border-blue-600/30 rounded-full hover:bg-blue-600/30 transition-colors {{ $sizeClasses[$size] }}">
    {{ $tag->name }}
</a>
