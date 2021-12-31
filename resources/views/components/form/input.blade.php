@props(['name', 'type', 'error'])
<div>
    <input
        class="{{ $error ? 'ring-4 ring-red-900 focus:ring-red-900' : ''}} w-full px-2 text-lg rounded focus:outline-none outline-ring-blue-500  focus:ring-blue-500 focus:ring-4  bg-gray-200 py-2"
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        placeholder="{{ ucwords($name) }}"
        value="{{  $name === 'password' ? '' : old($name)   }}"
    >
    @if($error)
    <div class="flex justify-start text-red-800 font-bold py-1 ml-0 text-lg ">
        <li>{{ $error ?? '' }}</li>
    </div>
    @endif
</div>
