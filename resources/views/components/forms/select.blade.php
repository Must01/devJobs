@props(['label' => '', 'name', 'required' => false])

<div>
    @if($label !== false)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-300 mb-2">
            {{ $label ?: ucfirst($name) }}
            @if($required) <span class="text-red-400">*</span> @endif
        </label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        @if($required) required @endif
        {{ $attributes->merge(['class' => 'w-full px-4 py-3 bg-white/10 border border-white/20 rounded-lg text-white focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500']) }}
    >
        {{ $slot }}
    </select>

    @error($name)
        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
    @enderror
</div>
