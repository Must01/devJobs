@props(['label', 'name', 'checked' => false])

<div class="flex items-center">
    <input
        type="checkbox"
        id="{{ $name }}"
        name="{{ $name }}"
        value="1"
        @if(old($name, $checked)) checked @endif
        class="w-4 h-4 text-blue-600 bg-gray-700 border-gray-600 rounded focus:ring-blue-500 focus:ring-2"
    />
    <label for="{{ $name }}" class="ml-2 text-sm text-gray-300">
        {{ $label }}
    </label>
</div>
