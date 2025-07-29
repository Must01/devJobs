@props(['employer', 'width' => '48'])

<div class="flex-shrink-0">
    @php
        $initials = strtoupper(substr($employer->name, 0, 2));
    @endphp

    @if($employer->logo)
        @if(str_starts_with($employer->logo, 'http'))
            {{-- Online image --}}
            <img
                src="{{ $employer->logo }}"
                alt="{{ $employer->name }}"
                class="rounded-lg object-cover"
                style="width: {{ $width }}px; height: {{ $width }}px;"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
            />
            {{-- Fallback initials --}}
            <div
                class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg items-center justify-center text-white font-bold hidden"
                style="width: {{ $width }}px; height: {{ $width }}px; font-size: {{ $width / 3 }}px;"
            >
                {{ $initials }}
            </div>
        @else
            {{-- Local storage image --}}
            <img
                src="{{ asset($employer->logo) }}"
                alt="{{ $employer->name }}"
                class="rounded-lg object-cover"
                style="width: {{ $width }}px; height: {{ $width }}px;"
                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
            />
            {{-- Fallback initials --}}
            <div
                class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg items-center justify-center text-white font-bold hidden"
                style="width: {{ $width }}px; height: {{ $width }}px; font-size: {{ $width / 3 }}px;"
            >
                {{ $initials }}
            </div>
        @endif
    @else
        {{-- No logo: show initials --}}
        <div
            class="bg-gradient-to-br from-blue-500 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold"
            style="width: {{ $width }}px; height: {{ $width }}px; font-size: {{ $width / 3 }}px;"
        >
            {{ $initials }}
        </div>
    @endif
</div>
