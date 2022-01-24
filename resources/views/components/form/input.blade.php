@props(['name', 'type', 'error', 'value'=> null])

@php

if ($name === 'password') $val = '';
else $val= old($name);
@endphp
<div>
    <input
        class="font-bold {{ $error ? 'ring-4 ring-red-900 focus:ring-red-900' : ''}} w-full px-2 text-lg rounded focus:outline-none outline-ring-blue-500  focus:ring-blue-500 focus:ring-4  bg-gray-200 py-2"
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ ucwords($name) }}"
        value="{{ auth()->user() ? $value: $val }}"
    >
   <x-form.error :error="$error" />
</div>
