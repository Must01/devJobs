@props(['method' => 'GET', 'action' => '', 'enctype' => ''])

<form
    method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
    action="{{ $action }}"
    @if($enctype) enctype="{{ $enctype }}" @endif
    {{ $attributes->merge(['class' => 'space-y-6']) }}
>
    @if($method !== 'GET')
        @csrf
    @endif

    @if(in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    {{ $slot }}
</form>
