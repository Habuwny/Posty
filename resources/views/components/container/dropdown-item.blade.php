@props(['routeLink', 'link'])
<a
    href="{{ route($routeLink) }}"
    class="flex items-center px-3 border-b-2 border-gray-600 rounded cursor-pointer py-2 justify-start text-center  hover:bg-sky-700  focus:sky-800"
>
    {{ $slot }}
    <span class="text-lg font-bold  text-white   block text-left px-3">{{ $link }}</span>
</a>
