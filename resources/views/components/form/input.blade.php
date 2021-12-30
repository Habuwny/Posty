@props(['name', 'type', 'error'])
<div>
    <input
        class="w-full px-2 text-lg rounded focus:outline-none outline-ring-blue-500  focus:ring-blue-500 focus:ring-4 ring-1   bg-gray-200 py-2"
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ ucwords($name) }}"
        value="{{  $name === 'password' ? '' : old($name)   }}"
    >

    <span>{{ $error ?? '' }}</span>
</div>
