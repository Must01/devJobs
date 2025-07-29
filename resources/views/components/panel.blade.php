@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'bg-white/5 backdrop-blur-sm border border-white/10 rounded-xl p-6 ' . $class]) }}>
    {{ $slot }}
</div>
